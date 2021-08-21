@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Menu Info
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Menu</a></li>
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
                <div class="card-body">

                    <form method="POST" action="{{route('menu.update',$menu->id)}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu Title</label>
                          <input type="text" name="title" value="{{ $menu->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Title">
                          <small id="emailHelp" class="form-text text-muted"> Please Create a Title for Frontend Menu.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Link </label>
                          <input type="text" name="link" value="{{ $menu->link }}" class="form-control" id="exampleInputPassword1" placeholder="Redirection Link">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword2"> Icon Class </label>
                          <input type="text" name="icon" value="{{ $menu->icon }}" class="form-control" id="exampleInputPassword2" placeholder="fas fa-kiwi-bird">
                        </div>

						<div class="form-group form-check">
							<label class="form-check-label">
							  <input class="form-check-input" @if ($menu->status == '1') checked @endif name="status" type="checkbox"> Menu Add in Footer?
							</label>
							<small id="emailHelp" class="form-text text-muted"> Do you want to add Events , Recomandation ? Please Checked first. </small>

						  </div>
                        
                        <button type="submit" class="btn btn-primary">Update</button>
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