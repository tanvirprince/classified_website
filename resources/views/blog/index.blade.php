@extends('layouts.master')

@section('before_scripts')
<style>
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}





.title{
    margin-bottom: 70px;
}

.title h3{
    position: relative;
    font-size: 45px;
    font-weight: 900;
}

.title h3 .bg{
    position: absolute;
    left: -6px;
    top: 0px;
    color: transparent;
    font-size: 100px;
    font-weight: 900;
    text-align: center;
    opacity: .1;
    line-height: 0;
    -webkit-text-stroke: 1px #000;
    -webkit-user-select: none;
}

.cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;
    
}

.card{
    box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
}

.card img{
    height: 250px;
    width: 100%;
    object-fit: cover;
}

.card-body{
    background-color: #fff;
    padding: 20px;
}

.card-body .text-date{
    font-size: 14px;
    color: #888;
    margin-bottom: 5px;
    line-height: 1.7;
}

.line{
    height: 1px;
    width: 100%;
    background-color: #999;
    margin-bottom: 20px;
}

.card-body .text{
    color: #000;
    font-size: 18px;
    font-weight: 600;
}

@media screen and (max-width: 900px) {
    .cards{
        grid-template-columns: repeat(2,1fr);
    }

    
}

@media screen and (max-width: 600px) {
    .cards{
        grid-template-columns: 1fr;
    }

    

    .title{
        margin-bottom: 30px;
        font-family: 'Courier New', monospace;
    }

    .title h3 .bg{
        display: none;
    }
}





</style>
@endsection

@section('content')


<div class="container">
    <div class="jumbotron "style="max-height: 8rem;">
      <div class="title">
        <h3 class="text-center">Blog <span class="bg">Blog</span></h3>
    </div>
  </div>
</div>  
{{-- new  --}}
<div class="container">
  <div class="cards">

    @foreach ($blogs as $blog)

    @php
					$timestamp = strtotime($blog->created_at);
					$day = date('d', $timestamp);
					$month = date('M', $timestamp);	
		@endphp

      <div class="card">
        <a href="{{route('blog.show',$blog->id)}}">
          <img  src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}" alt="">
          <div class="card-body">
              <p class="text-date">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</p>
              <div class="line"></div>
              
              <p class="text">{{$blog->title}}</p>
              
          </div>
        </a>
      </div>
  @endforeach
  </div>
</div>

<br/>
{{ $blogs->links() }}
<br>

{{-- <div class="container mb-3">
	<div class="col-md-12">
		<div class="row">
			@foreach ($blogs as $blog)
				
			<div class="col-md-4">
				
				<div class="column">
					@php
					$timestamp = strtotime($blog->created_at);
					$day = date('d', $timestamp);
					$month = date('M', $timestamp);	
					@endphp
					
					<div class="post-module">
					
					<div class="thumbnail">
						
            <img src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}" style=" height:200px;"/>
					</div>
					
					<div class="post-content">
						
						<a href="{{route('blog.show',$blog->id)}}">
						<h1 class="title">{{$blog->title}}</h1>
						</a>
						
						<p class="description">{{ $blog->short_description }}</p>
						<div class="post-meta"><span class="timestamp">
							<i class="fa fa-clock-o"></i>
							{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
							</span>
							
						</div>
					</div>
					</div>
				</div>
				
			</div>
			@endforeach
		</div>	
	</div>
</div> --}}








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

