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
@if (isset($latest) && !empty($latest) && $latest->posts->count() > 0)
	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' => $hideOnMobile])
	<div class="container{{ $hideOnMobile }}">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				
				<div class="col-xl-12 box-title no-border">
					<div class="inner">
						<h2>
							<span class="title-3">{!! $latest->title !!}</span>
							<a href="{{ $latest->link }}" class="sell-your-item">
								{{ t('View more') }} <i class="icon-th-list"></i>
							</a>
						</h2>
					</div>
				</div>
				
				<div id="postsList" class="adds-wrapper noSideBar category-list">
					@foreach($latest->posts as $key => $post)
						@continue(empty($post->city))
						<?php
							// Main Picture
							if ($post->pictures->count() > 0) {
								$postImg = imgUrl($post->pictures->get(0)->filename, 'medium');
							} else {
								$postImg = imgUrl(config('larapen.core.picture.default'), 'medium');
							}
						?>
						<div class="item-list">
							@if ($post->featured == 1)
								@if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
									@if ($post->latestPayment->package->ribbon != '')
										<div class="cornerRibbons {{ $post->latestPayment->package->ribbon }}">
											<a href="#"> {{ $post->latestPayment->package->short_name }}</a>
										</div>
									@endif
								@endif
							@endif
							
							<div class="row">
								<div class="col-sm-2 col-12 no-padding photobox">
									<div class="add-image">
										<span class="photo-count"><i class="fa fa-camera"></i> {{ $post->pictures->count() }} </span>
										<a href="{{ \App\Helpers\UrlGen::post($post) }}">
											<img class="lazyload img-thumbnail no-margin" src="{{ $postImg }}" alt="{{ $post->title }}">
										</a>
									</div>
								</div>
								
								<div class="{{ $colDescBox }} add-desc-box">
									<div class="items-details">
										<h5 class="add-title">
											<a href="{{ \App\Helpers\UrlGen::post($post) }}">{{ \Illuminate\Support\Str::limit($post->title, 70) }}</a>
										</h5>
										
										<span class="info-row">
											@if (isset($post->postType) && !empty($post->postType))
												<span class="add-type business-ads tooltipHere"
													  data-toggle="tooltip"
													  data-placement="bottom"
													  title="{{ $post->postType->name }}"
												>
													{{ strtoupper(mb_substr($post->postType->name, 0, 1)) }}
												</span>&nbsp;
											@endif
											@if (!config('settings.listing.hide_dates'))
												<span class="date">
													<i class="icon-clock"></i> {!! $post->created_at_formatted !!}
												</span>
											@endif
											<span class="category"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
												<i class="icon-folder-circled"></i>&nbsp;
												@if (isset($post->category->parent) && !empty($post->category->parent))
													<a href="{!! \App\Helpers\UrlGen::category($post->category->parent) !!}" class="info-link">
														{{ $post->category->parent->name }}
													</a>&nbsp;&raquo;&nbsp;
												@endif
												<a href="{!! \App\Helpers\UrlGen::category($post->category) !!}" class="info-link">
													{{ $post->category->name }}
												</a>
											</span>
											<span class="item-location"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
												<i class="icon-location-2"></i>&nbsp;
												<a href="{!! \App\Helpers\UrlGen::city($post->city) !!}" class="info-link">
													{{ $post->city->name }}
												</a>
												{{ (isset($post->distance)) ? '- ' . round($post->distance, 2) . getDistanceUnit() : '' }}
											</span>
										</span>
									</div>
									
									@if (config('plugins.reviews.installed'))
										@if (view()->exists('reviews::ratings-list'))
											@include('reviews::ratings-list')
										@endif
									@endif
								
								</div>
								
								<div class="{{ $colPriceBox }} text-right price-box" style="white-space: nowrap;">
									<h4 class="item-price">
										@if (isset($post->category, $post->category->type))
											@if (!in_array($post->category->type, ['not-salable']))
												@if (is_numeric($post->price) && $post->price > 0)
													{!! \App\Helpers\Number::money($post->price) !!}
												@elseif(is_numeric($post->price) && $post->price == 0)
													{!! t('free_as_price') !!}
												@else
													{!! \App\Helpers\Number::money(' --') !!}
												@endif
											@endif
										@else
											{{ '--' }}
										@endif
									</h4>&nbsp;
									@if (isset($post->latestPayment, $post->latestPayment->package) && !empty($post->latestPayment->package))
										@if ($post->latestPayment->package->has_badge == 1)
											<a class="btn btn-danger btn-sm make-favorite">
												<i class="fa fa-certificate"></i>
												<span> {{ $post->latestPayment->package->short_name }} </span>
											</a>&nbsp;
										@endif
									@endif
									@if (isset($post->savedByLoggedUser) && $post->savedByLoggedUser->count() > 0)
										<a class="btn btn-success btn-sm make-favorite" id="{{ $post->id }}">
											<i class="fa fa-heart"></i><span> {{ t('Saved') }} </span>
										</a>
									@else
										<a class="btn btn-default btn-sm make-favorite" id="{{ $post->id }}">
											<i class="fa fa-heart"></i><span> {{ t('Save') }} </span>
										</a>
									@endif
								</div>
							</div>
						</div>
					@endforeach
			
					<div style="clear: both"></div>
					
					@if (isset($latestOptions) && isset($latestOptions['show_view_more_btn']) && $latestOptions['show_view_more_btn'] == '1')
						<div class="mb20 text-center">
							<a href="{{ \App\Helpers\UrlGen::search() }}" class="btn btn-default mt10">
								<i class="fa fa-arrow-circle-right"></i> {{ t('View more') }}
							</a>
						</div>
					@endif
				</div>
				
			</div>
		</div>
	</div>

	
	  
@endif
@php

$all_ads = App\Models\Post::get()->take(10);
	
@endphp


<br/>
<br/>
<div class="container">
	

	<div class="tab">
	<button class="" onclick="openCity(event, 'London')">ALL Ads</button>
	<button class="tablinks" onclick="openCity(event, 'Paris')">RANDOMS</button>
	<button class="tablinks" onclick="openCity(event, 'Tokyo')">POLPULAR</button>
	</div>

	<div id="London" class="tabcontent">
	
	@foreach ($all_ads as $all)
	@php
			$image = App\Models\Picture::where('post_id', $all->id)->pluck('filename')->first();

	@endphp
		<div class="item-list bg-light" style="height: 362px;">	
				<div class="row">
					<div class="col-sm-2 col-12 no-padding photobox">
						<div class="add-image">
							<span class="photo-count"><i class="fa fa-camera"></i> 1 </span>
							<a href=""><img class="lazyload img-thumbnail no-margin" src="{{asset('/')}}storage/{{$image }}" alt="Web Developer"> </a>
						</div>
					</div>
					<div class="col-sm-7 col-12 add-desc-box">
						<div class="items-details">
							<h5 class="add-title"><a href="">{{ $all->title }} </a></h5>
							<span class="info-row">
								<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Private individual">p</span>&nbsp;
									<span class="date">
										<i class="icon-clock"></i> Jul 19th, 2021 at 12:21
									</span>
									<span class="category">
									<i class="icon-folder-circled"></i>
										<a href="" class="info-link">Automobiles</a>
										<a href="" class="info-link">Cars</a>
								</span>
								<span class="item-location">
									<i class="icon-location-2"></i>
									<a href="" class="info-link">London</a> 
								</span>
							</span>
						</div>				
					</div>
					
					<div class="col-sm-3 col-12 text-right price-box" style="white-space: nowrap;">
						<h4 class="item-price"></h4>
							<a class="btn btn-default btn-sm make-favorite" id="27">
							<i class="fa fa-heart"></i><span> Save </span>
							</a>
					</div>
				</div>
		</div>
	@endforeach
	<div id="Paris" class="tabcontent">
	<h3>Paris</h3>
	<p>Paris is the capital of France.</p> 
	</div>

	<div id="Tokyo" class="tabcontent">
	<h3>Tokyo</h3>
	<p>Tokyo is the capital of Japan.</p>
	</div>

</div>
{{-- another design  --}}

{{-- another design  --}}


@section('after_scripts')
    @parent
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