@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Blog Edit
			</h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Edit Blog</a></li>
				<li class="breadcrumb-item active">Edit</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')


	
	<div class="row">
		<div class="col-12">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-info-circle"></i>Edit Blog Post</h3>
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

								<form method="POST" action="{{route('blog.update',$blog->id)}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
									<label for="exampleInputEmail1">Title</label>
									<input type="text" name="title" value="{{ $blog->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blog Title">
									<small id="emailHelp" class="form-text text-muted"> Please Create a Title for Frontend Menu.</small>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Short Description </label>
										<input type="text" name="short_description" value="{{ $blog->short_description }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="short description">
										</div>
									<div class="form-group">
									<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/blog/blog_post/{{$blog->image }}" style="width:150px;height:150px;" alt="blog_image">
									<label for="exampleInputPassword1"> Image </label>
									<input type="file" name="image" class="form-control" id="exampleInputPassword1">
									</div>
									
                                    <div class="form-group">
                                    <label class="form-check-label text-dark-primary"> Description  </label>
                                    <textarea name="body" id="default"> {!! $blog->body !!}</textarea>
                                    </div>

									<div class="form-group form-check">
										<label class="form-check-label">
										<input class="form-check-input" @if($blog->status == '1') checked @endif name="status" type="checkbox"> Blog Show in recomanded
										</label>
										<small id="emailHelp" class="form-text text-muted"> Do you want to show it suggestion? </small>
									</div>
									
									<button type="submit" class="btn btn-primary">Update</button>
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
  height: 400,
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'

});
</script>


@endsection