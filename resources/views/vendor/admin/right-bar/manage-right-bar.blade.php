@extends('admin::layouts.master')

@section('header')
	<div class="row page-titles">
		<div class="col-md-12 col-12 align-self-center">
        {{-- <h2 class="mt-2"> {{ $footer->field19 }} </h2> --}}
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3 float-right">
                    <h3> Inside Ads Right Bar </h3>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                        Edit
                    </button>
                </div>
            </div>


        </div>




    <br>

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
        <form method="POST" action="{{route('right-bar.title')}}">
        @csrf
        <div class="form-group">

                <label for="exampleInputEmail1">Ads Title</label>
                <input type="text" value="{{ $footer->field19 }}" name="field19" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ads Suggestion Ttile">



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
                <th scope="col">Title</th>
                <th >SEO Meta Title</th>
                <th scope="col">Link</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rightBars as $rightBar)

              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="w-25">

                  <img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/right-bar/{{$rightBar->image }}" style="max-height:150px;" alt="Web Developer">

                </td>
                <td>{{$rightBar->title}}</td>
                <td>{{$rightBar->extra}}</td>
                <td>{{$rightBar->link}}</td>


                <td>
                  {{-- <a href="{{ route('blog.edit',$rightBar->id) }}"><i class="fa fa-edit" aria-hidden="true"></i>   </a> --}}
                  <a href="{{ route('right-bar.destroy',$rightBar->id) }}"><i class="fa fa-trash" aria-hidden="true"></i>   </a>
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
