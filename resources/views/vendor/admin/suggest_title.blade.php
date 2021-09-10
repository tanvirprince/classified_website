@extends('admin::layouts.master')
@section('after_styles')
	@parent
	
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	
@endsection

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			
		</div>
		<div class="col-md-6 col-12 align-self-center d-none d-md-block">
			<ol class="breadcrumb mb-0 p-0 bg-transparent float-right">
				<li class="breadcrumb-item"><a href="{{ admin_url() }}">Ads Suggestion </a></li>
				<li class="breadcrumb-item active">Ads Details page</li>
			</ol>
		</div>
	</div>
@endsection

@section('content')

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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Suggest Title Update
</button>

<br>

  
  <!-- Modal -->
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
        <form method="POST" action="{{route('footer.store')}}">
        @csrf
        <div class="form-group">
            
                <label for="exampleInputEmail1">Ads Suggustion Title</label>
                <input type="text" value="{{ $footer->field17 }}" name="field17" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ads Suggestion Ttile">

            
            
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
  <br>
  <h3 class="card-title">  Title:  {{ $footer->field17 }}  </h3>


@endsection



@section('after_scripts')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>    
	@parent
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection