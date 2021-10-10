<?php
// Default Map's values
$loc = [
	'show'       		=> false,
	'itemsCols'  		=> 3,
	'showButton' 		=> false,
	'countCitiesPosts' 	=> false,
];
$map = ['show' => false];

// Get Admin Map's values
if (isset($citiesOptions)) {
	if (isset($citiesOptions['show_cities']) and $citiesOptions['show_cities'] == '1') {
		$loc['show'] = true;
	}
	if (isset($citiesOptions['items_cols']) and !empty($citiesOptions['items_cols'])) {
		$loc['itemsCols'] = (int)$citiesOptions['items_cols'];
	}
	if (isset($citiesOptions['show_post_btn']) and $citiesOptions['show_post_btn'] == '1') {
		$loc['showButton'] = true;
	}

	if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
		if (isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
			$map['show'] = true;
		}
	}

	if (config('settings.listing.count_cities_posts')) {
		$loc['countCitiesPosts'] = true;
	}
}
$hideOnMobile = '';
if (isset($citiesOptions, $citiesOptions['hide_on_mobile']) and $citiesOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if ($loc['show'] || $map['show'])

@php
	$image = App\Models\GoogleAds::where('id',1)->first();
@endphp
	@if (!empty($image->ads_1))
	<div class="container mt-1">
		<ul class="list-unstyled footer-nav text-center">
			<li> Advertise zone 1 </li>
		</ul>
		<a href="//{{ $image->ads_1_link }}" target="_blank">
			<img class="lazyload img-thumbnail img-fluid no-margin" alt="{{ $image->ads_1_title }}" src="{{asset('/')}}assets/google_banner/ads_1/{{$image->ads_1 }}" style="max-height:150px;" alt="ads1">
		</a>
        {{-- {{ $image->auto_1 }} --}}
	</div>
@else

@endif

@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
<div class="container{{ $hideOnMobile }}">
	<div class="col-xl-12 page-content p-0">
		<div class="inner-box">

			<div class="row">
				@if (!$map['show'])
					<div class="row">
						<div class="col-xl-12 col-sm-12">
							<h2 class="title-3 pt-1 pr-3 pb-3 pl-3" style="white-space: nowrap;">
								<i class="icon-location-2"></i>&nbsp;{{ t('Choose a city') }}
							</h2>
						</div>
					</div>
				@endif
				<?php
				$leftClassCol = '';
				$rightClassCol = '';
				$ulCol = 'col-md-3 col-sm-12'; // Cities Columns

				if ($loc['show'] && $map['show']) {
					// Display the Cities & the Map
					$leftClassCol = 'col-lg-8 col-md-12';
					$rightClassCol = 'col-lg-3 col-md-12 mt-3 mt-xl-0 mt-lg-0';
					$ulCol = 'col-md-4 col-sm-6 col-xs-12';

					if ($loc['itemsCols'] == 2) {
						$leftClassCol = 'col-md-6 col-sm-12';
						$rightClassCol = 'col-md-5 col-sm-12';
						$ulCol = 'col-md-6 col-sm-12';
					}
					if ($loc['itemsCols'] == 1) {
						$leftClassCol = 'col-md-3 col-sm-12';
						$rightClassCol = 'col-md-8 col-sm-12';
						$ulCol = 'col-xl-12';
					}
				} else {
					if ($loc['show'] && !$map['show']) {
						// Display the Cities & Hide the Map
						$leftClassCol = 'col-xl-12';
					}
					if (!$loc['show'] && $map['show']) {
						// Display the Map & Hide the Cities
						$rightClassCol = 'col-xl-12';
					}
				}
				?>
				@if ($loc['show'])
				<div class="{{ $leftClassCol }} page-content m-0 p-0">
					@if (isset($cities))
						<div class="relative location-content">

							@if ($loc['show'] && $map['show'])
								<p class="title-3 pt-1 pr-3 pb-3 pl-3" style="font-weight: lighter; white-space: nowrap;">
									<i class="icon-location-2"></i>&nbsp; Choose <span style="font-weight: bold;">a City or Region</span>
								</p>
							@endif
							<div class="col-xl-12 tab-inner">
								<div class="row">
									@foreach ($cities as $key => $items)
										<ul class="cat-list {{ $ulCol }} mb-0 mb-xl-2 mb-lg-2 mb-md-2 {{ ($cities->count() == $key+1) ? 'cat-list-border' : '' }}">
											@foreach ($items as $k => $city)
												<li>
													@if ($city->id == 0)
														<a href="#browseAdminCities" data-toggle="modal">{!! $city->name !!}</a>
													@else
														<a href="{{ \App\Helpers\UrlGen::city($city) }}">
															{{ $city->name }}
														</a>
														@if ($loc['countCitiesPosts'])
															&nbsp;({{ $city->posts_count ?? 0 }})
														@endif
													@endif
												</li>
											@endforeach
										</ul>
									@endforeach
								</div>
							</div>

							@if ($loc['showButton'])
								@if (!auth()->check() and config('settings.single.guests_can_post_ads') != '1')
									<a class="btn btn-lg" style="background-color: red; color:white;" href="#quickLogin" data-toggle="modal">
										<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
									</a>
								@else
									<a class="btn btn-lg pl-4 pr-4" style="background-color: red; color:white;" href="{{ \App\Helpers\UrlGen::addPost() }}" style="text-transform: none;">
										<i class="fa fa-plus-circle"></i> {{ t('Add Listing') }}
									</a>
								@endif
							@endif

						</div>
					@endif
				</div>
				@endif

				@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.tools.svgmap', 'layouts.inc.tools.svgmap'])
			</div>

		</div>
	</div>
</div>
@endif

@section('modal_location')
	@parent
	@if ($loc['show'] || $map['show'])
		@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
	@endif
@endsection
