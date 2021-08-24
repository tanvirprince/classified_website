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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" value="{{ $footer->title }}" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Footer Title">
                          <small id="emailHelp" class="form-text text-muted"> Please Create a Title for Footer.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title 1</label>
                          <input type="text" value="{{ $footer->title1 }}" name="title1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title 1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title 2</label>
                          <input type="text" value="{{ $footer->title2 }}" name="title2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title 2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title 3</label>
                          <input type="text" value="{{ $footer->title3 }}" name="title3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title 3">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title 4</label>
                          <input type="text" value="{{ $footer->title4 }}" name="title4" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title 4">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field One  </label>
                          <input type="text" value="{{ $footer->email }}" name="email" class="form-control" id="exampleInputPassword1" placeholder="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Two </label>
                          <input type="text" value="{{ $footer->mobile_number }}" name="mobile_number" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Three </label>
                          <input type="text" value="{{ $footer->time }}" name="time" class="form-control" id="exampleInputPassword1" placeholder="Open office time">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Four  </label>
                          <input type="text" value="{{ $footer->company_details }}" name="company_details" class="form-control" id="exampleInputPassword1" placeholder="company_details">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Five </label>
                          <input type="text" value="{{ $footer->address }}" name="address" class="form-control" id="exampleInputPassword1" placeholder="address">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field six </label>
                          <input type="text" value="{{ $footer->link }}" name="link" class="form-control" id="exampleInputPassword1" placeholder="link">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Seven </label>
                          <input type="text" value="{{ $footer->facebook }}" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="facebook">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Eight </label>
                          <input type="text" value="{{ $footer->youtube }}" name="youtube" class="form-control" id="exampleInputPassword1" placeholder="youtube">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Nine </label>
                          <input type="text" value="{{ $footer->linkedIn }}" name="linkedIn" class="form-control" id="exampleInputPassword1" placeholder="linkedIn">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"> Field Ten </label>
                          <input type="text" value="{{ $footer->pinterest }}" name="pinterest" class="form-control" id="exampleInputPassword1" placeholder="pinterest">
                        </div>
                      </div>  
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu  1</label>
                          <input type="text" value="{{ $footer->menu1 }}" name="menu1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link  1</label>
                          <input type="text" value="{{ $footer->link1 }}" name="link1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu  2</label>
                          <input type="text" value="{{ $footer->menu2 }}" name="menu2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link 2 </label>
                          <input type="text" value="{{ $footer->link2 }}" name="link2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 2">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu 3</label>
                          <input type="text" value="{{ $footer->menu3 }}" name="menu3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 3">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link 3 </label>
                          <input type="text" value="{{ $footer->link3 }}" name="link3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 3">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu 4</label>
                          <input type="text" value="{{ $footer->menu4 }}" name="menu4" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 4">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link 4 </label>
                          <input type="text" value="{{ $footer->link4 }}" name="link4" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 4">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu 5</label>
                          <input type="text" value="{{ $footer->menu5 }}" name="menu5" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 5">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link 5 </label>
                          <input type="text" value="{{ $footer->link5 }}" name="link5" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 5">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu 6</label>
                          <input type="text" value="{{ $footer->menu6 }}" name="menu6" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="menu 6">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link 6 </label>
                          <input type="text" value="{{ $footer->link6 }}" name="link6" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link 6">
                        </div>

                        
                        
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