@extends('admin::layouts.master')
@section('after_styles')
	@parent
	
	
@endsection

@section('header')
	
@endsection

@section('content')


<div class="container">

  <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Select From Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">

    @foreach ($post as $posts)
    
    @php
    $image = App\Models\Picture::where('post_id', $posts->id)->pluck('filename')->first();
    @endphp

    <div class="col-lg-3 col-md-4 col-6">
      <a href="{{route('update.image-up',[$posts->id,$url])}}" class="d-block mb-4 h-100">
        @if (!empty($image))
        <img class="img-fluid img-thumbnail" src="{{asset('/')}}storage/{{$image }}" alt="">
        @else
        <img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="width:150px;height:150px;" alt="Web Developer">
        @endif 
      </a>
    </div>
        
    @endforeach
    
    
  </div>

</div>


  
 
@endsection



@section('after_scripts')

	@parent
    
@endsection