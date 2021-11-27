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
				<li class="breadcrumb-item"><a href="{{ admin_url('users') }}"> User Approval </a></li>
				<li class="breadcrumb-item active">All Users</li>
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

<div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $key=>$user)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
                <td>
                    @if ($user->user_approve == 0)
                        <span class="badge badge-pill badge-danger">Pending Approval</span>

                    @else
                        <span class="badge badge-pill badge-primary">Approved</span>

                    @endif

                </td>
                <td>
                    @if ($user->user_approve == 0)

                        <a class="btn btn-success"  href="{{ route('user.approved',$user->id) }}"> Approve </a>
                    @else

                    <a class="btn btn-warning"  href="{{ route('user.cancel',$user->id) }}"> Cancel </a>

                    @endif
                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
      {{ $users->links() }}
</div>



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
