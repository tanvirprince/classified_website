<?php
// Init.
$sForm = [
	'enableFormAreaCustomization' => '0',
	'hideTitles'                  => '0',
	'title'                       => t('sell_and_buy_near_you'),
	'subTitle'                    => t('simple_fast_and_efficient'),
	'bigTitleColor'               => '', // 'color: #FFF;',
	'subTitleColor'               => '', // 'color: #FFF;',
	'backgroundColor'             => '', // 'background-color: #444;',
	'backgroundImage'             => '', // null,
	'height'                      => '', // '450px',
	'parallax'                    => '0',
	'hideForm'                    => '0',
	'formBorderColor'             => '', // 'background-color: #333;',
	'formBorderSize'              => '', // '5px',
	'formBtnBackgroundColor'      => '', // 'background-color: #4682B4; border-color: #4682B4;',
	'formBtnTextColor'            => '', // 'color: #FFF;',
];

// Get Search Form Options
if (isset($searchFormOptions)) {
	if (isset($searchFormOptions['enable_form_area_customization']) and !empty($searchFormOptions['enable_form_area_customization'])) {
		$sForm['enableFormAreaCustomization'] = $searchFormOptions['enable_form_area_customization'];
	}
	if (isset($searchFormOptions['hide_titles']) and !empty($searchFormOptions['hide_titles'])) {
		$sForm['hideTitles'] = $searchFormOptions['hide_titles'];
	}
	if (isset($searchFormOptions['title_' . config('app.locale')]) and !empty($searchFormOptions['title_' . config('app.locale')])) {
		$sForm['title'] = $searchFormOptions['title_' . config('app.locale')];
		$sForm['title'] = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $sForm['title']);
		if (\Illuminate\Support\Str::contains($sForm['title'], '{count_ads}')) {
			try {
				$countPosts = \App\Models\Post::currentCountry()->unarchived()->count();
			} catch (\Exception $e) {
				$countPosts = 0;
			}
			$sForm['title'] = str_replace('{count_ads}', $countPosts, $sForm['title']);
		}
		if (\Illuminate\Support\Str::contains($sForm['title'], '{count_users}')) {
			try {
				$countUsers = \App\Models\User::count();
			} catch (\Exception $e) {
				$countUsers = 0;
			}
			$sForm['title'] = str_replace('{count_users}', $countUsers, $sForm['title']);
		}
	}
	if (isset($searchFormOptions['sub_title_' . config('app.locale')]) and !empty($searchFormOptions['sub_title_' . config('app.locale')])) {
		$sForm['subTitle'] = $searchFormOptions['sub_title_' . config('app.locale')];
		$sForm['subTitle'] = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $sForm['subTitle']);
		if (\Illuminate\Support\Str::contains($sForm['subTitle'], '{count_ads}')) {
			try {
				$countPosts = \App\Models\Post::currentCountry()->unarchived()->count();
			} catch (\Exception $e) {
				$countPosts = 0;
			}
			$sForm['subTitle'] = str_replace('{count_ads}', $countPosts, $sForm['subTitle']);
		}
		if (\Illuminate\Support\Str::contains($sForm['subTitle'], '{count_users}')) {
			try {
				$countUsers = \App\Models\User::count();
			} catch (\Exception $e) {
				$countUsers = 0;
			}
			$sForm['subTitle'] = str_replace('{count_users}', $countUsers, $sForm['subTitle']);
		}
	}
	if (isset($searchFormOptions['parallax']) and !empty($searchFormOptions['parallax'])) {
		$sForm['parallax'] = $searchFormOptions['parallax'];
	}
	if (isset($searchFormOptions['hide_form']) and !empty($searchFormOptions['hide_form'])) {
		$sForm['hideForm'] = $searchFormOptions['hide_form'];
	}
}

// Country Map status (shown/hidden)
$showMap = false;
if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
	if (isset($citiesOptions) and isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
		$showMap = true;
	}
}
$hideOnMobile = '';
if (isset($searchFormOptions, $searchFormOptions['hide_on_mobile']) and $searchFormOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if (isset($sForm['enableFormAreaCustomization']) and $sForm['enableFormAreaCustomization'] == '1')

	@if (isset($firstSection) and !$firstSection)
		<div class="h-spacer"></div>
	@endif

	<?php $parallax = (isset($sForm['parallax']) and $sForm['parallax'] == '1') ? 'parallax' : ''; ?>
	<div class="wide-intro {{ $parallax }}{{ $hideOnMobile }}">
		<div class="dtable hw100">
			<div class="dtable-cell hw100">
				<div class="container text-center">

					{{-- @if ($sForm['hideTitles'] != '1')
						<h1 class="intro-title animated fadeInDown"> {{ $sForm['title'] }} </h1>
						<p class="sub animateme fittext3 animated fadeIn">
							{!! $sForm['subTitle'] !!}
						</p>
					@endif --}}
                        @php
                        $footer_fb = \App\Models\Fb_foote::find(1)->first();
                        @endphp

					<div class="text-center mb-5">
						<h1>
                            <span class="color-world-black"> </span>  <span class="color-classified">
                                @if (!empty($footer_fb->title))
                                {{ $footer_fb->title }}
                                @else
                                World Classifieds Ads & More
                                @endif
                        </span>.
                        </h1>
						<h2>
                            <span class="color-bjourney-black">
                                @if (!empty($footer_fb->link))
                                {{ $footer_fb->link }}
                                @else
                                Level up your Personal & Business Journey
                                @endif
                            </span>
                            <span class="color-bjourney-red"></span>
                        </h2>
					</div>

					@if ($sForm['hideForm'] != '1')
						<div class="search-row animated fadeInUp rounded">
							<form id="search" name="search" action="{{ \App\Helpers\UrlGen::search() }}" method="GET">
								<div class="row m-0">
									<div class="col-md-5 col-sm-12 mb-1 mb-xl-0 mb-lg-0 mb-md-0 search-col relative">
										<i class="icon-keyboard icon-append"></i>
										<input type="text" name="q" class="form-control keyword has-icon" placeholder="Enter Keyword" value="">
									</div>

									<div class="col-md-5 col-sm-12 search-col relative locationicon">
										<i class="icon-location-circled icon-append"></i>
										<input type="hidden" id="lSearch" name="l" value="">
										@if ($showMap)
											<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
												   placeholder="Enter Location" value="" title="" data-placement="bottom"
												   data-toggle="tooltip"
												   data-original-title="{{ t('Enter a city name OR a state name with the prefix', ['prefix' => t('area')]) . t('State Name') }}">
										@else
											<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon"
												   placeholder="Please Enter Your Location" value="">
										@endif
									</div>

									<div class="col-md-2 col-sm-12 search-col">
										<button class="btn btn-search btn-block" style="color: white;">
											<i class="icon-search"></i> Search
										</button>
									</div>
								</div>
							</form>
						</div>
					@endif

				</div>
			</div>
		</div>
	</div>

@else

	@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'])
	<div class="container">
		<div class="intro rounded">
			<div class="dtable hw100">
				<div class="dtable-cell hw100">
					<div class="container text-center">

						<div class="search-row fadeInUp">
							<form id="search" name="search" action="{{ \App\Helpers\UrlGen::search() }}" method="GET">
								<div class="row m-0">
									<div class="col-md-5 col-sm-12 mb-1 mb-xl-0 mb-lg-0 mb-md-0 search-col relative">
										<i class="icon-docs icon-append"></i>
										<input type="text" name="q" class="form-control keyword has-icon" placeholder="{{ t('what') }}" value="">
									</div>

									<div class="col-md-5 col-sm-12 search-col relative locationicon">
										<i class="icon-location-2 icon-append"></i>
										<input type="hidden" id="lSearch" name="l" value="">
										@if ($showMap)
											<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
												   placeholder="{{ t('where') }}" value="" title="" data-placement="bottom"
												   data-toggle="tooltip" type="button"
												   data-original-title="{{ t('Enter a city name OR a state name with the prefix', ['prefix' => t('area')]) . t('State Name') }}">
										@else
											<input type="text" id="locSearch" name="location" class="form-control locinput input-rel searchtag-input has-icon"
												   placeholder="{{ t('where') }}" value="">
										@endif
									</div>

									<div class="col-md-2 col-sm-12 search-col">
										<button class="btn btn-primary btn-search btn-block">
											<i class="icon-search"></i> <strong>{{ t('find') }}</strong>
										</button>
									</div>
									{!! csrf_field() !!}
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endif
