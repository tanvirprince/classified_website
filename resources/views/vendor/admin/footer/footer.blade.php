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
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Footer</a></li>
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
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Footer </h3>
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

                    <form method="POST" action="{{route('footer.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" value="{{ $footer->title }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Footer Title">
                          <small id="emailHelp" class="form-text text-muted"> Please Create a Title for Footer.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> email </label>
                          <input type="text" value="{{ $footer->email }}" name="email" class="form-control" id="exampleInputPassword1" placeholder="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Mobile Number </label>
                          <input type="text" value="{{ $footer->mobile_number }}" name="mobile_number" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Time </label>
                          <input type="text" value="{{ $footer->time }}" name="time" class="form-control" id="exampleInputPassword1" placeholder="Open office time">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Company Details </label>
                          <input type="text" value="{{ $footer->company_details }}" name="company_details" class="form-control" id="exampleInputPassword1" placeholder="company_details">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Address </label>
                          <input type="text" value="{{ $footer->address }}" name="address" class="form-control" id="exampleInputPassword1" placeholder="address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> link </label>
                          <input type="text" value="{{ $footer->link }}" name="link" class="form-control" id="exampleInputPassword1" placeholder="link">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> facebook </label>
                          <input type="text" value="{{ $footer->facebook }}" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="facebook">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> youtube </label>
                          <input type="text" value="{{ $footer->youtube }}" name="youtube" class="form-control" id="exampleInputPassword1" placeholder="youtube">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> linkedIn </label>
                          <input type="text" value="{{ $footer->linkedIn }}" name="linkedIn" class="form-control" id="exampleInputPassword1" placeholder="linkedIn">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> pinterest </label>
                          <input type="text" value="{{ $footer->pinterest }}" name="pinterest" class="form-control" id="exampleInputPassword1" placeholder="pinterest">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

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