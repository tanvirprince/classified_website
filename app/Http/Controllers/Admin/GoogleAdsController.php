<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleAds;
use Illuminate\Http\Request;

class GoogleAdsController extends Controller
{
    public function adsGoogle(){

        $image = GoogleAds::where('id',1)->first();
        return view('admin::google_ads.google_ads',compact('image'));

    }
    public function updateSeoAds(Request $request){

        $googleAds = GoogleAds::first();
        
        $googleAds->ads_1_title = $request->ads_1_title;
        $googleAds->ads_1_tag = $request->ads_1_tag;

        $googleAds->ads_2_title = $request->ads_2_title;
        $googleAds->ads_2_tag = $request->ads_2_tag;

        $googleAds->ads_3_title = $request->ads_3_title;
        $googleAds->ads_3_tag = $request->ads_3_tag;

        $googleAds->ads_4_title = $request->ads_4_title;
        $googleAds->ads_4_tag = $request->ads_4_tag;

        $googleAds->ads_5_title = $request->ads_5_title;
        $googleAds->ads_5_tag = $request->ads_5_tag;
        $googleAds->save();

        return redirect()->back()->with('message','You have successfully Updated. Thankyou');
        
    }
    public function updateAds(Request $request){
        
        $googleAds = GoogleAds::first();
        if ($googleAds !== null){

            
            if ($request->ads_1 != null) {
                $ads_1 = time().'.'.$request->ads_1->extension();
                $request->ads_1->move(public_path('assets/google_banner/ads_1/'), $ads_1);
            }else{
                $ads_1 = $googleAds->ads_1;
            }

            if ($request->ads_2 != null) {
                $ads_2 = time().'.'.$request->ads_2->extension();
                $request->ads_2->move(public_path('assets/google_banner/ads_2/'), $ads_2);
            }else{
                $ads_2 = $googleAds->ads_2;
            }
            if ($request->ads_3 != null) {
                $ads_3 = time().'.'.$request->ads_3->extension();
                $request->ads_3->move(public_path('assets/google_banner/ads_3/'), $ads_3);

            }else{
                $ads_3 = $googleAds->ads_3;
            }
            if ($request->ads_4 != null) {
                $ads_4 = time().'.'.$request->ads_4->extension();
                $request->ads_4->move(public_path('assets/google_banner/ads_4/'), $ads_4);
            }else{
                $ads_4 = $googleAds->ads_4;
            }
            if ($request->ads_5 != null) {
                $ads_5 = time().'.'.$request->ads_5->extension();
                $request->ads_5->move(public_path('assets/google_banner/ads_5/'), $ads_5);
            }else{
                $ads_5 = $googleAds->ads_5;
                
            }
                
                $googleAds->ads_1 = $ads_1;
                $googleAds->ads_2 = $ads_2;
                $googleAds->ads_3 = $ads_3;
                $googleAds->ads_4 = $ads_4;
                $googleAds->ads_5 = $ads_5;
                $googleAds->ads_1_link = $request->ads_1_link;
                $googleAds->ads_2_link = $request->ads_2_link;
                $googleAds->ads_3_link = $request->ads_3_link;
                $googleAds->ads_4_link = $request->ads_4_link;
                $googleAds->ads_5_link = $request->ads_5_link;

                $googleAds->save();
                return redirect()->back()->with('message','You have successfully Updated. Thankyou');
            
        }else{
            $googleAds = new GoogleAds();
            if ($request->ads_1 != null) {
                $ads_1 = time().'.'.$request->ads_1->extension();
                $request->ads_1->move(public_path('assets/google_banner/ads_1/'), $ads_1);
            }else{
                $ads_1 = null;
            }

            if ($request->ads_2 != null) {
                $ads_2 = time().'.'.$request->ads_2->extension();
                $request->ads_2->move(public_path('assets/google_banner/ads_2/'), $ads_2);
            }else{
                $ads_2 = null;
            }
            if ($request->ads_3 != null) {
                $ads_3 = time().'.'.$request->ads_3->extension();
                $request->ads_3->move(public_path('assets/google_banner/ads_3/'), $ads_3);

            }else{
                $ads_3 = null;
            }
            if ($request->ads_4 != null) {
                $ads_4 = time().'.'.$request->ads_4->extension();
                $request->ads_4->move(public_path('assets/google_banner/ads_4/'), $ads_4);
            }else{
                $ads_4 = null;
            }
            if ($request->ads_5 != null) {
                $ads_5 = time().'.'.$request->ads_5->extension();
                $request->ads_5->move(public_path('assets/google_banner/ads_5/'), $ads_5);
            }else{
                
                $ads_5 = null;
            }
                
                $googleAds->ads_1 = $ads_1;
                $googleAds->ads_2 = $ads_2;
                $googleAds->ads_3 = $ads_3;
                $googleAds->ads_4 = $ads_4;
                $googleAds->ads_5 = $ads_5;
                $googleAds->ads_1_link = $request->ads_1_link;
                $googleAds->ads_2_link = $request->ads_2_link;
                $googleAds->ads_3_link = $request->ads_3_link;
                $googleAds->ads_4_link = $request->ads_4_link;
                $googleAds->ads_5_link = $request->ads_5_link;
                $googleAds->save();
                return redirect()->back()->with('message','You have successfully ceated. Thankyou');
        }   
        
    }

    public function deleteAdsGoogle($column)
	{
        $googleAds = GoogleAds::first();
        if ($googleAds->ads_1 == $column){

            $googleAds = GoogleAds::where('ads_1',$column)->first();
            $googleAds->ads_1 = null;
            $googleAds->save();

        }elseif($googleAds->ads_2 == $column){

            $googleAds = GoogleAds::where('ads_2',$column)->first();
            $googleAds->ads_2 = null;
            $googleAds->save();

        }elseif($googleAds->ads_3 == $column){

            $googleAds = GoogleAds::where('ads_3',$column)->first();
            $googleAds->ads_3 = null;
            $googleAds->save();

        }elseif($googleAds->ads_4 == $column){

            $googleAds = GoogleAds::where('ads_4',$column)->first();
            $googleAds->ads_4 = null;
            $googleAds->save();

        }else{

            $googleAds = GoogleAds::where('ads_5',$column)->first();
            $googleAds->ads_5 = null;
            $googleAds->save();
        }
        return redirect()->back()->with('message','You have successfully Deleted. Thankyou');

	}
}
