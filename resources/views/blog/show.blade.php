@extends('layouts.master')

@section('before_scripts')
<style>
	body {
  background: #f2f2f2;
  font-family: 'proxima-nova-soft', sans-serif;
  font-size: 14px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.post-module {
  position: relative;
  z-index: 1;
  display: block;
  background: #FFFFFF;
  min-width: 270px;
  height: 470px;
  -webkit-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.post-module:hover,
.hover {
  -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
}
.post-module:hover .thumbnail img,
.hover .thumbnail img {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  transform: scale(1.1);
  opacity: 0.6;
}
.post-module .thumbnail {
  background: #000000;
  height: 400px;
  overflow: hidden;
}
.post-module .thumbnail .date {
  position: absolute;
  top: 20px;
  right: 20px;
  z-index: 1;
  background: #e74c3c;
  width: 55px;
  height: 55px;
  padding: 12.5px 0;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  color: #FFFFFF;
  font-weight: 700;
  text-align: center;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.post-module .thumbnail .date .day {
  font-size: 18px;
}
.post-module .thumbnail .date .month {
  font-size: 12px;
  text-transform: uppercase;
}
.post-module .thumbnail img {
  display: block;
  width: 120%;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.post-module .post-content {
  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -moz-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -ms-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  -o-transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
  transition: all 0.3s cubic-bezier(0.37, 0.75, 0.61, 1.05) 0s;
}
.post-module .post-content .category {
  position: absolute;
  top: -34px;
  left: 0;
  background: #e74c3c;
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}
.post-module .post-content .title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}
.post-module .post-content .sub_title {
  margin: 0;
  padding: 0 0 20px;
  color: #e74c3c;
  font-size: 20px;
  font-weight: 400;
}
.post-module .post-content .description {
  display: none;
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
}
.post-module .post-content .post-meta {
  margin: 30px 0 0;
  color: #999999;
}
.post-module .post-content .post-meta .timestamp {
  margin: 0 16px 0 0;
}
.post-module .post-content .post-meta a {
  color: #999999;
  text-decoration: none;
}
.hover .post-content .description {
  display: block !important;
  height: auto !important;
  opacity: 1 !important;
}






</style>
@endsection

@section('content')

<div class="container">
  <div class="col-md-12">
    <div class="row">				
      <div class="col-lg-9">
        <!-- Featured blog post-->
        <div class="card mb-4">
          <div class="card-body">
            {{-- <div class="small text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
            </div> --}}
            <h2 class="card-title">{{$blog->title}}</h2>
            <p class="card-text">{{ $blog->short_description }}</p>
        </div>
            <a href="#!"><img class="card-img-top" src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}" alt="{{$blog->title}}"></a>
            <div class="card-body">
                
                <p class="card-text">{!! $blog->body !!}</p>
                
            </div>
        </div>
      </div>

      <div class="col-lg-3">
        @php
						$popular = App\Models\Post::where('status',1)->get()->take(6);
						$footer = App\Models\Footer::where('id', 1)->first();
	
						@endphp
						<div class="card sidebar-card">
							<div class="card-header">{{$footer->field17}}</div>
							<div class="card-content">
								<div class="card-body text-left">
									@foreach ($popular as $all)
									@php
											$image = App\Models\Picture::where('post_id', $all->id)->pluck('filename')->first();
											$category = App\Models\Category::where('id', $all->category_id)->pluck('name')->first();
											$country = App\Models\Country::where('code', $all->country_code)->pluck('capital')->first();
											$slug_cat = App\Models\Category::where('id', $all->category_id)->pluck('slug')->first();

									@endphp
									
									<div class="card">
										<img class="card-img-top" src="{{asset('/')}}storage/{{$image }}" alt="Card image cap">
										<hr>
										<div class="card-body">
										  {{-- <a href="{{ url("/$all->slug/$all->id")}}"><h3> {{ $all->title }}</h3></a> --}}
										  <h4 class="add-title"><a href="{{ url("/$all->slug/$all->id")}}">{{ $all->title }} </a></h4>
										</div>
									</div>
									<hr/>
									
									@endforeach
									
								</div>
							</div>
						</div>
            
      </div>
      
      {{-- @php
      $footer = App\Models\Footer::where('id', 1)->first();

      @endphp   
      
      <div class="col-lg-3">
        <div class="card-header">{{$footer->field18}}</div>
        @foreach ($recommanded as $blog)
        <div class="card mb-4 mt-3">
          <a href="#!"><img class="card-img-top" src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}" alt="..."></a>
          <div class="card-body">
              <div class="small text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</div>
              <h2 class="card-title h4">{{$blog->title}}</h2>
              <a class="btn btn-primary" href="{{route('blog.show',$blog->id)}}">Read more →</a>
          </div>
          @endforeach
      </div> --}}
      
      </div>
    </div>
  </div>
</div>



@endsection

@section('after_scripts')
<script>
	$(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});
</script>
@endsection

