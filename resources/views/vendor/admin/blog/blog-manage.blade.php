@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Blog Manage
			</h2>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Suggest Title Update
    </button>
    <br>
    <h2 class="bg-success mt-2">Title: {{$footer->field18}} </h2>
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Blog</a></li>
				<li class="breadcrumb-item active">Manage</li>
			</ol>
		</div>
	</div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route('blog.recommanded')}}">
        @csrf
        <div class="form-group">
            
                <label for="exampleInputEmail1">Ads Suggustion Title</label>
                <input type="text" value="{{ $footer->field18 }}" name="field18" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ads Suggestion Ttile">

            
            
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-12">
          <table id="myTable" class="table table-image">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Article Title</th>
                <th scope="col">Short Description</th>
                <th scope="col">Show in Recomandation</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blog as $blogs)
              @php
                $user = App\Models\User::where('id',$blogs->id)->get()->pluck('name');
              @endphp
              
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="w-25">
                  
                  <img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/blog/blog_post/{{$blogs->image }}" style="max-height:150px;" alt="Web Developer">
                                  
                </td>
                <td>{{$blogs->title}}</td>
                <td>{{$blogs->short_description}}</td>
                <td>  
                  @if ($blogs->status == '1')
                  <span class="badge badge-dark-primary"> yes </span>
                  @else  
                  <span class="badge badge-dark-danger"> No </span>  
                  @endif
                </td>
                
                <td>
                  <a href="{{ route('blog.edit',$blogs->id) }}"><i class="fa fa-edit" aria-hidden="true"></i>   </a>
                  <a href="{{ route('blog.destroy',$blogs->id) }}"><i class="fa fa-trash" aria-hidden="true"></i>   </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>   
      </div>
    </div>
  </div>

@endsection

@section('after_styles')
	@parent
    <style>
        .container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image td, .table-image th {
  vertical-align: middle;
}
    </style>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

@endsection

@section('after_scripts')
	@parent
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

@endsection