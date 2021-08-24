@extends('admin::layouts.master')
@section('after_styles')
	@parent
	
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	
@endsection

@section('header')
	<div class="row page-titles">
		<div class="col-md-6 col-12 align-self-center">
			<h2 class="mb-0">
				Ads Info
			</h2>
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


	
	<div class="row">
		<div class="col-12">
			<div class="card rounded">
				<div class="card-header">
					<h3 class="card-title"><i class="fas fa-info-circle"></i> Ads Suggestion (In Details page side) </h3>
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
                
				
				<div class="card-body table-bordered">
					<div class="row">
						<div class="col-md-12">

                            <table id="myTable" class="table table-hover">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th >Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Suggestion</th>
                                    <th scope="col">Remove</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $posts)

                                    @php
                                        $image = App\Models\Picture::where('post_id', $posts->id)->pluck('filename')->first();
                                    @endphp
                                    <tr>
                                        
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if (!empty($image))
                                        <img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}storage/{{$image }}" style="width:150px;height:150px;" alt="Web Developer">
                                        @else
                                        <img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="width:150px;height:150px;" alt="Web Developer">
                                        @endif    
                                    
                                    </td>
                                    <td><p style="font-size: 16px;"><span class="badge badge-pill badge-primary">{{ $posts->title }}</span></p></td>
                                    <td> 
                                        @if ($posts->status == '1')
                                            <button class="btn btn-dark-info"> Show </button>
                                        @else

                                        <button class="btn btn-dark-danger"> Not Suggest </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('suggest.store',$posts->id) }}"><i class="fa fa-database" aria-hidden="true"></i>   </a>
                                        {{-- <a class="btn btn-dark-primary" href="{{ route('suggest.store',$posts->id) }}"> Recomand </a> --}}
                                    </td>
                                    <td>
                                        <a class="btn btn-dark-danger" href="{{ route('suggest.off',$posts->id) }}"> Remove </a>

                                    </td>
                                    </tr>

                                    @endforeach
                                    
                                    
                                  
                                  
                                </tbody>
                              </table>
                              {{ $post->links() }}

                              
						</div>
					</div>
				</div>
			</div>
		</div>
		
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