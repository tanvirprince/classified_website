@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Banner Section Home Page
			</h2>
		</div>

	</div>
@endsection

@section('content')



	<div class="row">
		<div class="col-12">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Slider Title Slogun  </h3>
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
                          <label for="exampleInputEmail1"><span class="badge badge-primary"> Title </span></label>
                          <input type="text" value="{{ $footer_fb->title }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><span class="badge badge-primary"> Dialogue </span></label>
                          <input type="text" value="{{ $footer_fb->link }}" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>

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
