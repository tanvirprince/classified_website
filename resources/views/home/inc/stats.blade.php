<?php
$hideOnMobile = '';
if (isset($statsOptions, $statsOptions['hide_on_mobile']) and $statsOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@php
$image = App\Models\GoogleAds::where('id',1)->first();
@endphp
@if (!empty($image->ads_2))
<div class="container mt-1">
	<ul class="list-unstyled footer-nav text-center">
		<li> Advertise zone 2 </li>
	</ul>
	<a href="//{{ $image->ads_2_link }}" target="_blank" class="d-flex justify-content-center">
		<img class="lazyload img-thumbnail img-fluid no-margin" src="{{asset('/')}}assets/google_banner/ads_2/{{$image->ads_2 }}" style="max-height:150px;" alt="ads2">
	</a>
</div>
@else

@if (!empty($image->auto_1))
    <ul class="list-unstyled footer-nav text-center">
        <li> Advertise zone 2 </li>
    </ul>
	<div class="container mt-1 d-flex justify-content-center">
        {!! $image->auto_2 !!}
	</div>

@endif

@endif



{{-- temporay commetn for client request  --}}
{{-- @php
	$footer_menu = App\Models\Menu::where('status',1)->get()
@endphp

<div class="container{{ $hideOnMobile }} mt-3" style=" color: rgb(52, 61, 71);">
	<div class="page-info page-info-lite rounded">
		<div class="text-center section-promo">
			<div class="row">
				@foreach ($footer_menu as $list)


				<div class="col-sm-4 col-xs-6 col-xxs-12">
					<div class="iconbox-wrap">
						<div class="iconbox">
							<div class="iconbox-wrap-icon" >
								<i  class="{{$list->icon}}"></i>
							</div>
							<div class="iconbox-wrap-content">
							<a href="{{ $list->link }}">
								<div class="iconbox-wrap-text" style="font-size: 30px; font-weight: bold;"> {{$list->title}} </div>
							</a>
							</div>
						</div>
					</div>
				</div>

				@endforeach

			</div>
		</div>
	</div>
</div>

<br> --}}
{{-- temporay commetn for client request  --}}



{{-- @if (isset($countPosts) and isset($countUsers) and isset($countCities))
@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
<div class="container{{ $hideOnMobile }}">
	<div class="page-info page-info-lite rounded">
		<div class="text-center section-promo">
			<div class="row">

				@if (isset($countPosts))
				<div class="col-sm-4 col-xs-6 col-xxs-12">
					<div class="iconbox-wrap">
						<div class="iconbox">
							<div class="iconbox-wrap-icon">
								<i class="icon icon-docs"></i>
							</div>
							<div class="iconbox-wrap-content">
								<h5><span>{{ $countPosts }}</span></h5>
								<div class="iconbox-wrap-text">{{ t('free_ads') }}</div>
							</div>
						</div>
					</div>
				</div>
				@endif

				@if (isset($countUsers))
				<div class="col-sm-4 col-xs-6 col-xxs-12">
					<div class="iconbox-wrap">
						<div class="iconbox">
							<div class="iconbox-wrap-icon">
								<i class="icon icon-group"></i>
							</div>
							<div class="iconbox-wrap-content">
								<h5><span>{{ $countUsers }}</span></h5>
								<div class="iconbox-wrap-text">{{ t('Trusted Sellers') }}</div>
							</div>
						</div>
					</div>
				</div>
				@endif

				@if (isset($countCities))
				<div class="col-sm-4 col-xs-6 col-xxs-12">
					<div class="iconbox-wrap">
						<div class="iconbox">
							<div class="iconbox-wrap-icon">
								<i class="icon icon-map"></i>
							</div>
							<div class="iconbox-wrap-content">
								<h5><span>{{ $countCities . '+' }}</span></h5>
								<div class="iconbox-wrap-text">{{ t('locations') }}</div>
							</div>
						</div>
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>
</div>
@endif --}}
