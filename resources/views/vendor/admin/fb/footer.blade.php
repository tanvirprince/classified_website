@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Footer Info
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Footer Field</a></li>
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
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Title Menu Link  </h3>
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

                
                <div class="card-body">

                    <form method="POST" action="{{route('facebook_footer.store')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                      <div class="col-md-6">
                    
                        <div class="form-group">
                          <label for="exampleInputEmail1"><span class="badge badge-primary">Title </span></label>
                          <input type="text" value="{{ $footer_fb->title }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><span class="badge badge-primary">Link</span></label>
                          <input type="text" value="{{ $footer_fb->link }}" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><span class="badge badge-primary">Image </span></label>
                          <input type="file" value="{{ $footer_fb->image }}" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link">
                        </div>
                        {{-- <img src="{{ '/storage/app/public/'.$footer_fb->image }}" class="alignright" alt="ff">
                        <img src="{{ url('storage/app/public/'.$footer_fb->image) }}" alt="ss" title="" />
                        <img src="{{ storage_path('storage/app/public/'.$footer_fb->image) }}" style="width: 100%; height: 100%;">
                        <img src="{{ env('MY_APP').'/storage/app/public/'.$footer_fb->image }}" class="alignright" alt=""> --}}

                        <img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$footer_fb->image }}" style="height: 180px;" alt="Web Developer">
                        
                      </div>  
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>

              
				
			
			</div>
		</div>
		
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