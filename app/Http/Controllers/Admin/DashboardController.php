<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Post;
use App\Models\User;
use App\Models\Footer;
use App\Models\Country;
use Illuminate\Http\Request;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Controllers\Admin\Traits\Charts\MorrisTrait;
use App\Http\Controllers\Admin\Traits\Charts\ChartjsTrait;

class DashboardController extends PanelController
{
	use MorrisTrait, ChartjsTrait;
	
	public $data = [];
	
	protected $countCountries = 0;
	
	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('admin');
		
		parent::__construct();
		
		// Get the Mini Stats data
		$countActivatedPosts = 0;
		$countUnactivatedPosts = 0;
		$countActivatedUsers = 0;
		$countUnactivatedUsers = 0;
		$countUsers = 0;
		
		try {
			$countActivatedPosts = Post::verified()->count();
			$countUnactivatedPosts = Post::unverified()->count();
			$countActivatedUsers = User::doesntHave('permissions')->verified()->count();
			$countUnactivatedUsers = User::doesntHave('permissions')->unverified()->count();
			$countUsers = User::doesntHave('permissions')->count();
			$this->countCountries = Country::where('active', 1)->count();
		} catch (\Exception $e) {}
		
		view()->share('countActivatedPosts', $countActivatedPosts);
		view()->share('countUnactivatedPosts', $countUnactivatedPosts);
		view()->share('countActivatedUsers', $countActivatedUsers);
		view()->share('countUnactivatedUsers', $countUnactivatedUsers);
		view()->share('countUsers', $countUsers);
		view()->share('countCountries', $this->countCountries);
	}
	
	/**
	 * Show the admin dashboard.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function dashboard()
	{
		// Dashboard Latest Entries Chart: 'bar' or 'line'
		$tmp = @explode('_', config('settings.app.vector_charts_type'));
		if (isset($tmp[0], $tmp[1]) && !empty($tmp[0]) && !empty($tmp[1])) {
			$this->data['chartsType'] = ['provider' => $tmp[0], 'type' => $tmp[1]];
		} else {
			$this->data['chartsType'] = ['provider' => 'morris', 'type' => 'bar'];
		}
		
		// Limit latest entries
		$latestEntriesLimit = config('settings.app.latest_entries_limit', 5);
		
		// -----
		
		// Get latest Ads
		$this->data['latestPosts'] = Post::take($latestEntriesLimit)->orderBy('created_at', 'DESC')->get();
		
		// Get latest Users
		$this->data['latestUsers'] = User::take($latestEntriesLimit)->orderBy('created_at', 'DESC')->get();
		
		// Get latest entries charts
		$statDayNumber = 30;
		
		$getLatestPostsChartMethod = 'getLatestPostsFor' . ucfirst($this->data['chartsType']['provider']);
		if (method_exists($this, $getLatestPostsChartMethod)) {
			$this->data['latestPostsChart'] = $this->$getLatestPostsChartMethod($statDayNumber);
		}
		
		$getLatestUsersChartMethod = 'getLatestUsersFor' . ucfirst($this->data['chartsType']['provider']);
		if (method_exists($this, $getLatestUsersChartMethod)) {
			$this->data['latestUsersChart'] = $this->$getLatestUsersChartMethod($statDayNumber);
		}
		
		// Get entries per country charts
		if (config('settings.app.show_countries_charts')) {
			$countriesLimit = 10;
			$this->data['postsPerCountry'] = $this->getPostsPerCountryForChartjs($countriesLimit);
			$this->data['usersPerCountry'] = $this->getUsersPerCountryForChartjs($countriesLimit);
		}
		
		// -----
		
		// Page Title
		$this->data['title'] = trans('admin.dashboard');
		
		return view('admin::dashboard.index', $this->data);
	}

	public function menu(){
		$menu = Menu::get();
		return view('admin::menu.menu',compact('menu'));
	}

	public function menuEdit($id){
		$menu = Menu::where('id',$id)->first();
		return view('admin::menu.edit_menu',compact('menu'));
	}

	public function storeMenu(Request $request){
		
		$menu = new Menu();
		$menu->title = $request->title;
		$menu->link = $request->link;
		$menu->icon = $request->icon;
		if($request->status != null){
			$menu->status = $request->status = 1;
		}
		$menu->save();
		return redirect()->route('menu.create')->with('message','Menu added successfully');
	}


	public function menuUpdate(Request $request,$id){
		
		
		$menu = Menu::find($id);
		$menu->title = $request->title;
		$menu->link = $request->link;
		$menu->icon = $request->icon;
		if($request->status != null){
			$menu->status = $request->status = 1;
		}
		$menu->save();
		return redirect()->route('menu.create')->with('message','Menu Updated Successfully added successfully');
	}



	public function menuDestroy($id){
		
		$menu = Menu::findOrFail($id);
		$menu->delete();
		return redirect()->route('menu.create')->with('deleted','Menu Deleted successfully');

	}

	public function footer(){

		$footer = Footer::find(1)->first();

		return view('admin::footer.footer',compact('footer'));
	}

	public function storeFooter(Request $request){
		$footers = Footer::get();
		// $footer = $footers::updateOrCreate(
		// 	['title' =>  request('title')],
		// 	['email' => request('email')],
		// 	['mobile_number' => request('mobile_number')],
		// 	['time' => request('time')],
		// 	['company_details' => request('company_details')],
		// 	['address' => request('address')],
		// 	['link' => request('link')],
		// 	['facebook' => request('facebook')],
		// 	['youtube' => request('youtube')],
		// 	['linkedIn' => request('linkedIn')],
		// 	['pinterest' => request('pinterest')]
		// );
			if($footers == null){

				$footer = new Footer();
				$footer->title = $request->title;
				$footer->email = $request->email;
				$footer->mobile_number = $request->mobile_number;
				$footer->time = $request->time;
				$footer->company_details = $request->company_details;
				$footer->address = $request->address;
				$footer->link = $request->link;
				$footer->facebook = $request->facebook;
				$footer->youtube = $request->youtube;
				$footer->linkedIn = $request->linkedIn;
				$footer->pinterest = $request->pinterest;
				$footer->save();

			}else{
				$footer = Footer::find(1)->first();
				$footer->title = $request->title;
				$footer->email = $request->email;
				$footer->mobile_number = $request->mobile_number;
				$footer->time = $request->time;
				$footer->company_details = $request->company_details;
				$footer->address = $request->address;
				$footer->link = $request->link;
				$footer->facebook = $request->facebook;
				$footer->youtube = $request->youtube;
				$footer->linkedIn = $request->linkedIn;
				$footer->pinterest = $request->pinterest;
				$footer->save();

			}
		
		return redirect()->route('footer.create')->with('message','added successfully');
	}


	
	/**
	 * Redirect to the dashboard.
	 *
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function redirect()
	{
		// The '/admin' route is not to be used as a page, because it breaks the menu's active state.
		return redirect(admin_uri('dashboard'));
	}
}
