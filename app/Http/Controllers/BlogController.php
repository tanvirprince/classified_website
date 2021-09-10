<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::paginate(1);
        return view('blog.index',compact('blogs'));
    }

    public function show($id){
        $blog = Blog::find($id);
        $recommanded = Blog::where('status','1')->get();
        return view('blog.show',compact('blog','recommanded'));
    }
    
}
