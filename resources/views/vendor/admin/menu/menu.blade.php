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

                    <form method="POST" action="{{route('menu.store')}}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu Title</label>
                          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Menu Title">
                          <small id="emailHelp" class="form-text text-muted"> Please Create a Title for Frontend Menu.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Link </label>
                          <input type="text" name="link" class="form-control" id="exampleInputPassword1" placeholder="Redirection Link">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword2"> Icon Class </label>
                          <input type="text" name="icon" class="form-control" id="exampleInputPassword2" placeholder="fas fa-kiwi-bird">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
				
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($menu))
                                        @foreach ($menu as $key => $menus)

                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $menus->title }}</td>
                                            <td><a href="{{ $menus->link }}" class="badge badge-danger">{{ $menus->link }}</a></td>
                                            <td>{{$menus->icon}}</td>
                                            <td>
                                            <a href="{{ route('menu.destroy',$menus->id) }}"><i class="fa fa-trash" aria-hidden="true"></i>   </a>
                                            </td>
                                          </tr>
                                            
                                        @endforeach
                                    @else
                                    <h1> No data Found </h1>    
                                    @endif
                                  
                                  
                                </tbody>
                              </table>
                              
							
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