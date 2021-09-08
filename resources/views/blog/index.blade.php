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
	<div class="jumbotron bg-danger">
		<h1 class="text-white"> Business Journey - Blog  </h1>
		<p class="lead text-white">World Classifieds Ads & More . Level up your Personal & Business Journey</p>
		{{-- <hr class="my-2"> --}}
		{{-- <div class="input-group">
			<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
			aria-describedby="search-addon" />
			<button type="button" class="btn btn-outline-primary rounded">search</button>
		</div> --}}
	</div>
	
</div>  





<div class="container mb-3">
	<div class="col-md-12">
		<div class="row">
			@foreach ($blogs as $blog)
				
			<div class="col-md-4">
				<!-- Normal Demo-->
				<div class="column">
					@php
					$timestamp = strtotime($blog->created_at);
					$day = date('d', $timestamp);
					$month = date('M', $timestamp);
					// var_dump($day);	
					@endphp
					<!-- Post-->
					<div class="post-module">
					<!-- Thumbnail-->
					<div class="thumbnail">
						<div class="date">
						<div class="day">{{$day}}</div>
						<div class="month">{{$month}}</div>
						</div><img src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}"/>
					</div>
					<!-- Post Content-->
					<div class="post-content">
						<div class="category">Photos</div>
						<a href="{{route('blog.show',$blog->id)}}">
						<h1 class="title">{{$blog->title}}</h1>
						</a>
						{{-- <h2 class="sub_title">Title</h2> --}}
						<p class="description">{{ $blog->short_description }}</p>
						<div class="post-meta"><span class="timestamp">
							<i class="fa fa-clock-o"></i>
							{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
							</span>
							{{-- <span class="comments"><i class="fa fa-comments"></i><a href="#">39 comments</a></span> --}}
						</div>
					</div>
					</div>
				</div>
				<!-- Hover Demo-->
			</div>
			@endforeach
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

