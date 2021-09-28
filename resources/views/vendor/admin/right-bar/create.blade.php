@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Inside Page Right Bar ads Create
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Right Bar Inside Page</a></li>
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
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Right Bar Inside Page </h3>
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
						<div class="col-md-12 col-sm-12">
							<div class="card-body">

								<form method="POST" action="{{route('right-bar.store')}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
									<label for="exampleInputEmail1">Title</label>
									<input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
									</div>
                                    <div class="form-group">
									<label for="exampleInputEmail1">Meta Title</label>
									<input type="text" name="meta_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="SEO Meta Title">
									</div>
                                    <div class="form-group">
									<label for="exampleInputEmail1">Link</label>
									<input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link">
									</div>
									<div class="form-group">
									<label for="exampleInputPassword1"> Image </label>
									<input type="file" name="image" class="form-control" id="exampleInputPassword1">
									</div>

									<button type="submit" class="btn btn-primary">Submit</button>
								</form>

							</div>
						</div>
						{{-- <div class="col-md-6 col-sm-12">
							<div class="card-body">

							</div>
						</div> --}}

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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
  selector: 'textarea#default',
  height: 300,
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

});
</script>

@endsection
