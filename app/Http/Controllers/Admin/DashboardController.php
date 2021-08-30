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
use App\Models\Picture;
use App\Models\Fb_foote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
		$footer = Footer::find(1)->first();
		return view('admin::menu.menu',compact('menu','footer'));
	}

	public function menuEdit($id){
		$menu = Menu::where('id',$id)->first();
		return view('admin::menu.edit_menu',compact('menu'));
	}


	public function dropdownUpdate(Request $request){
		$footer = Footer::find(1)->first();
		$footer->dropdown_1 = $request->dropdown_1;
		$footer->dropdown_2 = $request->dropdown_2;
		$footer->dropdown_1_status = $request->dropdown_1_status;
		$footer->dropdown_2_status = $request->dropdown_2_status;
		$footer->save();
		return redirect()->route('menu.create')->with('message','Dropdown Menu Data Inserted Successfully');
	}

	

	public function storeMenu(Request $request){
		
		$menu = new Menu();
		$menu->title = $request->title;
		$menu->link = $request->link;
		$menu->icon = $request->icon;
		if($request->status != null){
			$menu->status = 1;
		}
		if($request->dropdown_status != null){
			$menu->status =  2;
		}
		if($request->dropdown_2_menu != null){
			$menu->status =  3;
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
			$menu->status = 1;
		}
		if($request->dropdown_status != null){
			$menu->status = 2;
		}
		if($request->dropdown_2_menu != null){
			$menu->status =  3;
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
		$footer_fb = Fb_foote::find(1)->first();

		return view('admin::footer.footer',compact('footer','footer_fb'));
	}
	public function storeFb(){

		$footer = Footer::find(1)->first();
		$footer_fb = Fb_foote::find(1)->first();

		return view('admin::fb.footer',compact('footer','footer_fb'));
	}

	public function storeFooter(Request $request){
		$footers = Footer::get();
		
			if($footers == null){

				$footer = new Footer();

				if($request->field17){
					$footer->field17 = $request->field17;
					$footer->save();
					return redirect()->route('ads.suggest')->with('message','Added successfully');
				}

				$footer->title = $request->title;

				$footer->title = $request->title;
				$footer->title1 = $request->title1;
				$footer->title2 = $request->title2;
				$footer->title3 = $request->title3;
				$footer->title4 = $request->title4;
				$footer->title5 = $request->title5;

				$footer->field11 = $request->field11;
				$footer->field12 = $request->field12;
				$footer->field13 = $request->field13;
				$footer->field14 = $request->field14;
				$footer->field15 = $request->field15;
				$footer->field16 = $request->field16;
				
				// $footer->field18 = $request->field18;

				$footer->menu1 = $request->menu1;
				$footer->menu2 = $request->menu2;
				$footer->menu3 = $request->menu3;
				$footer->menu4 = $request->menu4;
				$footer->menu5 = $request->menu5;
				$footer->menu6 = $request->menu6;
				$footer->menu7 = $request->menu7;
				$footer->menu8 = $request->menu8;
				$footer->menu9 = $request->menu9;
				$footer->menu10 = $request->menu10;

				$footer->link1 = $request->link1;
				$footer->link2 = $request->link2;
				$footer->link3 = $request->link3;
				$footer->link4 = $request->link4;
				$footer->link5 = $request->link5;
				$footer->link6 = $request->link6;
				$footer->link7 = $request->link7;
				$footer->link8 = $request->link8;
				$footer->link9 = $request->link9;
				$footer->link10 = $request->link10;

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

				if($request->field17){
					$footer->field17 = $request->field17;
					$footer->save();
					return redirect()->route('ads.suggest')->with('message','Added successfully');
				}
				$footer->title = $request->title;
				$footer->title1 = $request->title1;
				$footer->title2 = $request->title2;
				$footer->title3 = $request->title3;
				$footer->title4 = $request->title4;
				$footer->title5 = $request->title5;

				$footer->field11 = $request->field11;
				$footer->field12 = $request->field12;
				$footer->field13 = $request->field13;
				$footer->field14 = $request->field14;
				$footer->field15 = $request->field15;
				$footer->field16 = $request->field16;
				// $footer->field17 = $request->field17;

				$footer->menu1 = $request->menu1;
				$footer->menu2 = $request->menu2;
				$footer->menu3 = $request->menu3;
				$footer->menu4 = $request->menu4;
				$footer->menu5 = $request->menu5;
				$footer->menu6 = $request->menu6;
				$footer->menu7 = $request->menu7;
				$footer->menu8 = $request->menu8;
				$footer->menu9 = $request->menu9;
				$footer->menu10 = $request->menu10;

				$footer->link1 = $request->link1;
				$footer->link2 = $request->link2;
				$footer->link3 = $request->link3;
				$footer->link4 = $request->link4;
				$footer->link5 = $request->link5;
				$footer->link6 = $request->link6;
				$footer->link7 = $request->link7;
				$footer->link8 = $request->link8;
				$footer->link9 = $request->link9;
				$footer->link10 = $request->link10;


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

	public function updateFb(Request $request){

		if($request->image){

				
			$file = '';
			if ($request->hasFile('image')){
				$file = Storage::disk('public')->put('about', $request->file('image'));
			}
			$about = Fb_foote::find(1)->first();
			if ($request->hasFile('image')){
				$about->title = $request->title;
				$about->link = $request->link;
				$about->image = $file;
				$about->save();
	
			}else{
				$about->title = $request->title;
				$about->body = $request->body;
				$about->save();
			}
			return redirect()->back()
				->with('success', 'about has been Added successfully');

		}
		
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


	public function suggest()
	{
		$post = Post::paginate(15);
		$footer = Footer::where('id', 1)->first();

		return view('admin::suggest',compact('post','footer'));

	}

	public function imageAdd()
	{
		$post = Post::paginate(15);
		$footer = Footer::where('id', 1)->first();

		return view('admin::add_image',compact('post','footer'));

	}

	public function selectImage($id)
	{
		
		$post = Post::get();
		$url = $id;

		return view('admin::show-image',compact('post','url'));

	}


	public function updateImage($id,$url)
	{
		
		$picture = Picture::where('post_id', $id)->pluck('filename')->first();
		$pic = new Picture();
		$pic->post_id = $url;
		$pic->filename = $picture;
		$pic->position = 1;
		$pic->active = 1;
		// dd($pic);
		$pic->save();
		return redirect()->route('ads.image-upload')->with('message',' Picture added successfully! Thankyou');

	}


	public function storeSuggestion($id)
	{
		// return $id;
		$post = Post::findOrFail($id);
		$post->status = '1';
		$post->save();
		return redirect()->route('ads.suggest')->with('message','Recommanded Suggestion ads successfully');

	}
	public function suggestionOff($id)
	{
		$post = Post::findOrFail($id);
		$post->status = '0';
		$post->save();
		return redirect()->route('ads.suggest')->with('message','Recomanded Remove successfully');


	}
}
