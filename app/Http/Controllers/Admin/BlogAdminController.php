<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Footer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RightBar;
use Illuminate\Support\Facades\Auth;

class BlogAdminController extends Controller
{
    // admin blog create
    public function create(){

        return view('admin::blog.blog-create');
    }

    public function store(Request $request){

        // $this->validate(request(),[
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        //     ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/blog/blog_post/'), $imageName);

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(array(':' ,' ', '\\', '/', ','), '-', $request->title)).'-'.Str::random(5);
        $blog->image = $imageName;
        $blog->body = $request->body;
        if($request->status != null){
            $blog->status = 1;
        }
        $blog->save();

        return redirect()->route('blog.create')->with('message','You have successfully Posted. Thankyou');

    }

    public function manage(){
        $blog = Blog::get();
        $footer = Footer::where('id', 1)->first();

        return view('admin::blog.blog-manage',compact('blog','footer'));
    }

    public function blogEdit($id){
        $blog = Blog::find($id);
        return view('admin::blog.blog-edit',compact('blog'));
    }

    public function blogDestroy($id){

	$blog = Blog::findOrFail($id);
    $blog->delete();
    return redirect()->route('blog.manage')->with('deleted','Blog Post has Deleted successfully');

    }

    public function blogUpdate(Request $request,$id){
        $blog = Blog::find($id);

        if($request->has('image')){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/blog/blog_post/'), $imageName);

            $blog->user_id = Auth::user()->id;
            $blog->title = $request->title;
            $blog->short_description = $request->short_description;
            $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(array(':' ,' ', '\\', '/', ','), '-', $request->title)).'-'.Str::random(5);
            $blog->image = $imageName;
            $blog->body = $request->body;
            if($request->status != null){
                $blog->status = 1;
            }
            $blog->save();
            return redirect()->route('blog.manage')->with('message','You have successfully Updated. Thankyou');

        }else{
            $blog->user_id = Auth::user()->id;
            $blog->title = $request->title;
            $blog->short_description = $request->short_description;

            $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(array(':' ,' ', '\\', '/', ','), '-', $request->title)).'-'.Str::random(5);

            $blog->body = $request->body;
            if($request->status != null){
                $blog->status = 1;
            }
            $blog->save();
            return redirect()->route('blog.manage')->with('message','You have successfully Updated. Thankyou');
        }


    }

    public function rightBar(){
        $rightBar = RightBar::get();
        return view('admin::right-bar.create',compact('rightBar'));
    }
    public function storeRightBar(Request $request){

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/right-bar/'), $imageName);

        $righBar = new RightBar();
        $righBar->title = $request->title;
        $righBar->extra = $request->meta_title;
        $righBar->link = $request->link;
        $righBar->image = $imageName;
        $righBar->save();

        return redirect()->route('rightbar')->with('message','You have successfully Added. Thankyou');

    }

    public function manageRightBar(){
        $rightBars = RightBar::get();
        $footer = Footer::where('id', 1)->first();

        return view('admin::right-bar.manage-right-bar',compact('rightBars','footer'));
    }
    public function rightBarDestroy($id){

        $rightBar = RightBar::findOrFail($id);
        $rightBar->delete();
        return redirect()->route('manage-right-bar')->with('deleted','Deleted successfully');

        }
}
