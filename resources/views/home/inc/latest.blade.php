<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
if (config('settings.listing.display_mode') == '.compact-view') {
	$colDescBox = 'col-sm-9 col-12';
	$colPriceBox = 'col-sm-3 col-12';
} else {
	$colDescBox = 'col-sm-7 col-12';
	$colPriceBox = 'col-sm-3 col-12';
}
$hideOnMobile = '';
if (isset($latestOptions, $latestOptions['hide_on_mobile']) and $latestOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>

<br/>

{{-- <p>In this example, we use JavaScript to "click" on the London button, to open the tab on page load.</p> --}}
<div class="container">

	{{-- <span class="title-3">Browse by <span style="font-weight: bold;">Category</span></span> --}}
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')" id="defaultOpen"><span class="title-3" style="font-weight: lighter;">All <span style="font-weight: bold;">Ads</span></span></button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"><span class="title-3" style="font-weight: lighter;">Popular <span style="font-weight: bold;">Ads</span></span></button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')"><span class="title-3" style="font-weight: lighter;">Latest <span style="font-weight: bold;">Ads</span></span></button>
</div>
@php
$all_ads = App\Models\Post::latest()->get()->take(4);
$front_random_active = App\Models\Post::get()->random(4);
$randoms = App\Models\Post::latest()->get()->take(4);
$popular = App\Models\Post::get()->sortByDesc('visits')->take(4);

@endphp

<div id="London" class="tabcontent" style="display: block;">
	<br/>
	<br/>

	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							{{-- <span class="title-3">{!! $latest->title !!}</span> --}}
							<a href="{{ $latest->link }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
	<div id="postsList" class="adds-wrapper noSideBar category-list make-grid">

 	@foreach ($front_random_active as $all)
			@php
				$image = App\Models\Picture::where('post_id', $all->id)->pluck('filename')->first();
				$category = App\Models\Category::where('id', $all->category_id)->pluck('name')->first();
				$country = App\Models\Country::where('code', $all->country_code)->pluck('capital')->first();
				$slug_cat = App\Models\Category::where('id', $all->category_id)->pluck('slug')->first();
			@endphp

			<div class="item-list bg-light" style="height: 354px;">
					<div class="row">
						<div class="col-sm-2 col-12 no-padding photobox">
							<div class="add-image">
								<span class="photo-count"><i class="fa fa-camera"></i> 1 </span>

								@if (!empty($image))
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 180px;" alt="Web Developer"> </a>
								@else
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="Web Developer"> </a>
								@endif


								{{-- <a href="{{ url("/$all->slug/$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 150px;" alt="Web Developer"> </a> --}}
							</div>
						</div>
						<div class="col-sm-7 col-12 add-desc-box">
							<div class="items-details">
								<h5 class="add-title"><a href="{{ url("/$all->slug-$all->id")}}">{{ $all->title }} </a></h5>
								<span class="info-row">

										<span class="date">
											<i class="icon-clock"></i> {{$all->created_at->DiffForHumans()}}
										</span>
										<span class="category">
										<i class="icon-folder-circled"></i>
											<a href="{{ url("/category/$slug_cat")}}" class="info-link">{{$category}}</a>
									</span>
									<span class="item-location">
										<i class="icon-location-2"></i>
										<a href="{{ url("/location/$country/$all->city_id")}}" class="info-link">{{$country}}</a>
									</span>
								</span>
							</div>
						</div>

						<div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;">
							<h4 class="item-price">{{ $all->price }}</h4>
								<a class="btn btn-default btn-sm make-favorite" id="27">
								<i class="fa fa-heart"></i><span> Save </span>
								</a>
						</div>
					</div>
			</div>
	@endforeach
	</div>
</div>
</div>
</div>

</div>

<div id="Paris" class="tabcontent">

	<br/>
	<br/>

	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							{{-- <span class="title-3">{!! $latest->title !!}</span> --}}
							<a href="{{ $latest->link }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
	<div id="postsList" class="adds-wrapper noSideBar category-list make-grid">

 	@foreach ($popular as $all)
			@php
				$image = App\Models\Picture::where('post_id', $all->id)->pluck('filename')->first();
				$category = App\Models\Category::where('id', $all->category_id)->pluck('name')->first();
				$country = App\Models\Country::where('code', $all->country_code)->pluck('capital')->first();
				$slug_cat = App\Models\Category::where('id', $all->category_id)->pluck('slug')->first();
			@endphp

			<div class="item-list bg-light" style="height: 354px;">
					<div class="row">
						<div class="col-sm-2 col-12 no-padding photobox">
							<div class="add-image">
								<span class="photo-count"><i class="fa fa-camera"></i> 1 </span>

								@if (!empty($image))
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 180px;" alt="Web Developer"> </a>
								@else
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="Web Developer"> </a>
								@endif


								{{-- <a href="{{ url("/$all->slug/$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 150px;" alt="Web Developer"> </a> --}}
							</div>
						</div>
						<div class="col-sm-7 col-12 add-desc-box">
							<div class="items-details">
								<h5 class="add-title"><a href="{{ url("/$all->slug-$all->id")}}">{{ $all->title }} </a></h5>
								<span class="info-row">

										<span class="date">
											<i class="icon-clock"></i> {{$all->created_at->DiffForHumans()}}
										</span>
										<span class="category">
										<i class="icon-folder-circled"></i>
											<a href="{{ url("/category/$slug_cat")}}" class="info-link">{{$category}}</a>
									</span>
									<span class="item-location">
										<i class="icon-location-2"></i>
										<a href="{{ url("/location/$country/$all->city_id")}}" class="info-link">{{$country}}</a>
									</span>
								</span>
							</div>
						</div>

						<div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;">
							<h4 class="item-price">{{ $all->price }}</h4>
								<a class="btn btn-default btn-sm make-favorite" id="27">
								<i class="fa fa-heart"></i><span> Save </span>
								</a>
						</div>
					</div>
			</div>
	@endforeach
	</div>
</div>
</div>
</div>

</div>

<div id="Tokyo" class="tabcontent">

{{-- starts from here  		 --}}
<br/>
	<br/>

	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							{{-- <span class="title-3">{!! $latest->title !!}</span> --}}
							<a href="{{ $latest->link }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
	<div id="postsList" class="adds-wrapper noSideBar category-list make-grid">

		@foreach ($randoms as $all)
		@php
				$image = App\Models\Picture::where('post_id', $all->id)->pluck('filename')->first();
				$category = App\Models\Category::where('id', $all->category_id)->pluck('name')->first();
				$country = App\Models\Country::where('code', $all->country_code)->pluck('capital')->first();
				$slug_cat = App\Models\Category::where('id', $all->category_id)->pluck('slug')->first();

		@endphp

			<div class="item-list bg-light" style="height: 354px;">
					<div class="row">
						<div class="col-sm-2 col-12 no-padding photobox">
							<div class="add-image">
								<span class="photo-count"><i class="fa fa-camera"></i> 1 </span>

								@if (!empty($image))
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 180px;" alt="Web Developer"> </a>
								@else
								<a href="{{ url("/$all->slug-$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}images/no_image.jpg" style="height: 180px;" alt="Web Developer"> </a>
								@endif


								{{-- <a href="{{ url("/$all->slug/$all->id")}}"><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" style="height: 150px;" alt="Web Developer"> </a> --}}
							</div>
						</div>
						<div class="col-sm-7 col-12 add-desc-box">
							<div class="items-details">
								<h5 class="add-title"><a href="{{ url("/$all->slug-$all->id")}}">{{ $all->title }} </a></h5>
								<span class="info-row">

										<span class="date">
											<i class="icon-clock"></i> {{$all->created_at->DiffForHumans()}}
										</span>
										<span class="category">
										<i class="icon-folder-circled"></i>
											<a href="{{ url("/category/$slug_cat")}}" class="info-link">{{$category}}</a>
									</span>
									<span class="item-location">
										<i class="icon-location-2"></i>
										<a href="{{ url("/location/$country/$all->city_id")}}" class="info-link">{{$country}}</a>
									</span>
								</span>
							</div>
						</div>

						<div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;">
							<h4 class="item-price">{{ $all->price }}</h4>
								<a class="btn btn-default btn-sm make-favorite" id="27">
								<i class="fa fa-heart"></i><span> Save </span>
								</a>
						</div>
					</div>
			</div>
	@endforeach
	</div>
</div>
</div>
</div>

</div>


{{-- another design  --}}

{{-- another design  --}}


@section('after_scripts')
    @parent

	<script>
		$(document).ready(function(){
		  $(".nav-tabs a").click(function(){
			$(this).tab('show');
		  });
		});
		</script>
    <script>

		/* Default view (See in /js/script.js) */
		@if (isset($posts) && count($posts) > 0)
			@if (config('settings.listing.display_mode') == '.grid-view')
				gridView('.grid-view');
			@elseif (config('settings.listing.display_mode') == '.list-view')
				listView('.list-view');
			@elseif (config('settings.listing.display_mode') == '.compact-view')
				compactView('.compact-view');
			@else
				gridView('.grid-view');
			@endif
		@else
			listView('.list-view');
		@endif
		/* Save the Search page display mode */
		var listingDisplayMode = readCookie('listing_display_mode');
		if (!listingDisplayMode) {
			createCookie('listing_display_mode', '{{ config('settings.listing.display_mode', '.grid-view') }}', 7);
		}

		/* Favorites Translation */
		var lang = {
			labelSavePostSave: "{!! t('Save ad') !!}",
			labelSavePostRemove: "{!! t('Remove favorite') !!}",
			loginToSavePost: "{!! t('Please log in to save the Ads') !!}",
			loginToSaveSearch: "{!! t('Please log in to save your search') !!}",
			confirmationSavePost: "{!! t('Post saved in favorites successfully') !!}",
			confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully') !!}",
			confirmationSaveSearch: "{!! t('Search saved successfully') !!}",
			confirmationRemoveSaveSearch: "{!! t('Search deleted successfully') !!}"
		};
    </script>



@endsection
