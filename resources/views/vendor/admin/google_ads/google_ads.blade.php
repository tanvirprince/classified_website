@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Ads Place google
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">ads</a></li>
				<li class="breadcrumb-item active">Create</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')


	
	<div class="row">
		<div class="col-12">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Menu </h3>
				</div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('deleted'))
                    <div class="alert alert-danger">
                        {{ session()->get('deleted') }}
                    </div>
                @endif
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="card-body">

								<form method="POST" action="{{route('update.banner')}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
									<label for="exampleInputPassword2"> Ads 1 Home page </label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{$image->ads_1_link}}" name="ads_1_link" placeholder="link">
									{{-- ads 1 image  --}}
									@if (!empty($image->ads_1))
									<a href="{{ route('delete.img',$image->ads_1) }}" class="btn btn-danger mt-2 mb-2"> Delete</a>
									<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_1/{{$image->ads_1 }}" style="max-height:150px;" alt="ads1">
									@else
									 	<img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 80px;" alt="ads1">
									@endif
									<input type="file" name="ads_1" class="form-control" id="exampleInputPassword2">
									</div>

									<div class="form-group">
									<label for="exampleInputPassword2"> Ads 2 Home page </label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{$image->ads_2_link}}" name="ads_2_link" placeholder="link">
									{{-- ads 2 image  --}}
									@if (!empty($image->ads_2))
									<a href="{{ route('delete.img',$image->ads_2) }}" class="btn btn-danger mt-2 mb-2"> Delete</a>
										<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_2/{{$image->ads_2 }}" style="max-height:150px;" alt="ads2">
									@else
										<img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="ads2">
									@endif

									<input type="file" name="ads_2" class="form-control" id="exampleInputPassword2">
									</div>

									<div class="form-group">
									<label for="exampleInputPassword2"> Ads 3</label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{$image->ads_3_link}}" name="ads_3_link" placeholder="link">

									{{-- ads 3 image  --}}
									@if (!empty($image->ads_3))
									<a href="{{ route('delete.img',$image->ads_3) }}" class="btn btn-danger mt-2 mb-2"> Delete</a>
										<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_3/{{$image->ads_3 }}" style="max-height:150px;" alt="ads3">
									@else
										<img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 80px;" alt="ads3">
									@endif
									<input type="file" name="ads_3" class="form-control" id="exampleInputPassword2">
									</div>
									<div class="form-group">
									<label for="exampleInputPassword2"> Ads 4</label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{$image->ads_4_link}}" name="ads_4_link" placeholder="link">
									{{-- ads 4 image  --}}
									@if (!empty($image->ads_4))
									<a href="{{ route('delete.img',$image->ads_4) }}" class="btn btn-danger mt-2 mb-2"> Delete</a>
										<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_4/{{$image->ads_4 }}" style="max-height:150px;" alt="ads4">
									@else
										<img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="ads4">
									@endif
									<input type="file" name="ads_4" class="form-control" id="exampleInputPassword2">
									</div>
									<div class="form-group">
									<label for="exampleInputPassword2"> Ads 5</label>
									<input type="text" class="form-control" id="exampleInputEmail1" value="{{$image->ads_5_link}}" name="ads_5_link" placeholder="link">									
										{{-- ads 5 image  --}}
									@if (!empty($image->ads_5))
									<a href="{{ route('delete.img',$image->ads_5) }}" class="btn btn-danger mt-2 mb-2"> Delete</a>
									    <img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_5/{{$image->ads_5 }}" style="max-height:150px;" alt="ads5">
									@else
										<img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="ads5">
									@endif
									<input type="file" name="ads_5" class="form-control" id="exampleInputPassword2">
									</div>
		
									
									
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
		
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="card-body">

								<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_ads/ads_2/{{$image->ads_2 }}" style="max-height:150px;" alt="Web Developer">


							</div>
						</div>

					</div>
				</div>
				
					
			</div>
		</div>
		
		{{-- <div class="col-6">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> {{ trans('messages.requirements') }}</h3>
				</div>
				
				<div class="card-body pt-0 pb-0">
					<div class="row">
						<div class="col-md-12">
							<ul class="system-info">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-6">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-folder-open"></i> {{ trans('messages.permissions') }}</h3>
				</div>
				
				<div class="card-body pt-0 pb-0">
					<div class="row">
						<div class="col-md-12">
							<ul class="system-info">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>

@endsection

@section('after_styles')
	@parent
	<style>
		
	</style>
@endsection

@section('after_scripts')
	@parent
@endsection