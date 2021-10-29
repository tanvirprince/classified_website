<?php
if (
	config('settings.other.ios_app_url') ||
	config('settings.other.android_app_url') ||
	config('settings.social_link.facebook_page_url') ||
	config('settings.social_link.twitter_url') ||
	config('settings.social_link.google_plus_url') ||
	config('settings.social_link.linkedin_url') ||
	config('settings.social_link.pinterest_url') ||
	config('settings.social_link.instagram_url')
) {
	$colClass1 = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
	$colClass2 = 'col-lg-3 col-md-3 col-sm-3 col-xs-6';
	$colClass3 = 'col-lg-2 col-md-2 col-sm-2 col-xs-12';
	$colClass4 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
} else {
	$colClass1 = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
	$colClass2 = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
	$colClass3 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
	$colClass4 = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
}
?>
@php
	$footer = App\Models\Footer::where('id',1)->first()
@endphp
<div class="container-fluid bg-dark">
	<div class="row col-md-12">
		<div class="col-md-4">
		<h1 class="text-white"> </h1>
		</div>
		<div class="col-md-4">

		</div>
		<div class="col-md-4">

		</div>

	</div>
</div>
<div class="container-fluid bg-success">
	<div class="row col-md-12">
		<div class="col-md-4">

		</div>
		<div class="col-md-4">
			<h1>  </h1>
		</div>
		<div class="col-md-4">

		</div>

	</div>
</div>
<div class="container-fluid bg-grey">
	<div class="row col-md-12">
		<div class="col-md-4">

		</div>
		<div class="col-md-4">

		</div>
		<div class="col-md-4">
			<h1>  </h1>
		</div>

	</div>
</div>
<div class="container">
	<div class="row col-md-12 ">
		<div class="col-md-4">
			<h2 class="footer-title"> {{ $footer->title }} </h2>

			<h4><a href="{{ $footer->link11 }}" style="color: black;">{{ $footer->email }}</a></h4>
			<h4><a href="{{ $footer->link12 }}" style="color: black;">{{ $footer->mobile_number }}</a></h4>
			<h4><a href="{{ $footer->link13 }}" style="color: black;">{{ $footer->field11 }}</a></h4>
			<h4><a href="{{ $footer->link14 }}" style="color: black;">{{ $footer->field12 }}</a></h4>
			<h4><a href="{{ $footer->link15 }}" style="color: black;">{{ $footer->field13 }}</a></h4>
		</div>
		<div class="col-md-4">
			<h2 class="footer-title"> {{ $footer->title1 }}</h2>
			<h4><a href="{{ $footer->link16 }}" style="color: black;">{{ $footer->time }}</a></h4>
			<h4><a href="{{ $footer->link17 }}" style="color: black;">{{ $footer->address }}</a></h4>
			<h4><a href="{{ $footer->link18 }}" style="color: black;">{{ $footer->field14 }}</a></h4>
			<h4><a href="{{ $footer->link19 }}" style="color: black;">{{ $footer->field15 }}</a></h4>
			<h4><a href="{{ $footer->link20 }}" style="color: black;">{{ $footer->field16 }}</a></h4>

		</div>
		<div class="col-md-4">
			<h2 class="footer-title">{{ $footer->pinterest }}</h2>

			<iframe src="https://www.facebook.com/plugins/group.php?href=https%3A%2F%2Fwww.facebook.com%2Fgroups%2Fbusinessjourneynet&width=250&show_metadata=false&appId=872948206507683&height=241" width="250" height="241" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

		</div>
		<br>

	</div>
</div>



<footer class="main-footer">
	<div class="footer-content">
		<div class="container">
			<div class="row">

				@if (!config('settings.footer.hide_links'))
					<div class="{{ $colClass1 }}">
						<div class="footer-col">
							<h4 class="footer-title">{{ $footer->title2 }}</h4>
							<ul class="list-unstyled footer-nav">
								<li><a href="{{ $footer->link1 }}"> {{ $footer->menu1 }} </a></li>
								<li><a href="{{ $footer->link2 }}"> {{ $footer->menu2 }} </a></li>
								<li><a href="{{ $footer->link3 }}"> {{ $footer->menu3 }} </a></li>
								<li><a href="{{ $footer->link4 }}"> {{ $footer->menu4 }} </a></li>
								<li><a href="{{ $footer->link5 }}"> {{ $footer->menu5 }} </a></li>


							</ul>
						</div>
					</div>

					<div class="{{ $colClass2 }}">
						<div class="footer-col">
							<h4 class="footer-title">{{ $footer->title3 }}</h4>
							<ul class="list-unstyled footer-nav">

								<li><a href="{{ $footer->link6 }}"> {{ $footer->menu6 }} </a></li>
								<li><a href="{{ $footer->link7 }}"> {{ $footer->menu7 }} </a></li>
								<li><a href="{{ $footer->link8 }}"> {{ $footer->menu8 }} </a></li>
								<li><a href="{{ $footer->link9 }}"> {{ $footer->menu9 }} </a></li>
								<li><a href="{{ $footer->link10 }}"> {{ $footer->menu10 }} </a></li>
							</ul>
						</div>
					</div>

					<div class="{{ $colClass3 }}">
						<div class="footer-col">
							<h4 class="footer-title">{{ $footer->title4 }}</h4>
							<ul class="list-unstyled footer-nav">
								<li><a href="{{ $footer->link21 }}"> {{ $footer->company_details }} </a></li>
								<li><a href="{{ $footer->link22 }}"> {{ $footer->link }} </a></li>
								<li><a href="{{ $footer->link23 }}"> {{ $footer->facebook }} </a></li>
								<li><a href="{{ $footer->link24 }}"> {{ $footer->youtube }} </a></li>
								<li><a href="{{ $footer->link25 }}"> {{ $footer->linkedIn }} </a></li>
							</ul>
						</div>
					</div>

					{{-- <div class="{{ $colClass3 }}">
						<div class="footer-col">
							<h4 class="footer-title">{{ t('My Account') }}</h4>
							<ul class="list-unstyled footer-nav">
								@if (!auth()->user())
									<li>
										@if (config('settings.security.login_open_in_modal'))
											<a href="#quickLogin" data-toggle="modal"> {{ t('log_in') }} </a>
										@else
											<a href="{{ \App\Helpers\UrlGen::login() }}"> {{ t('log_in') }} </a>
										@endif
									</li>
									<li><a href="{{ \App\Helpers\UrlGen::register() }}"> {{ t('register') }} </a></li>
								@else
									<li><a href="{{ url('account') }}"> {{ t('Personal Home') }} </a></li>
									<li><a href="{{ url('account/my-posts') }}"> {{ t('my_ads') }} </a></li>
									<li><a href="{{ url('account/favourite') }}"> {{ t('favourite_ads') }} </a></li>
								@endif
							</ul>
						</div>
					</div> --}}

					@if (
						config('settings.other.ios_app_url') or
						config('settings.other.android_app_url') or
						config('settings.social_link.facebook_page_url') or
						config('settings.social_link.twitter_url') or
						config('settings.social_link.google_plus_url') or
						config('settings.social_link.linkedin_url') or
						config('settings.social_link.pinterest_url') or
						config('settings.social_link.instagram_url')
						)
						<div class="{{ $colClass4 }}">
							<div class="footer-col row">
								<?php
									$footerSocialClass = '';
									$footerSocialTitleClass = '';
								?>
								{{-- @todo: API Plugin --}}
								@if (config('settings.other.ios_app_url') or config('settings.other.android_app_url'))
									<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
										<div class="mobile-app-content">
											<h4 class="footer-title">{{ t('Mobile Apps') }}</h4>
											<div class="row ">
												@if (config('settings.other.ios_app_url'))
												<div class="col-xs-12 col-sm-6">
													<a class="app-icon" target="_blank" href="{{ config('settings.other.ios_app_url') }}">
														<span class="hide-visually">{{ t('iOS app') }}</span>
														<img src="{{ url('images/site/app-store-badge.svg') }}" alt="{{ t('Available on the App Store') }}">
													</a>
												</div>
												@endif
												@if (config('settings.other.android_app_url'))
												<div class="col-xs-12 col-sm-6">
													<a class="app-icon" target="_blank" href="{{ config('settings.other.android_app_url') }}">
														<span class="hide-visually">{{ t('Android App') }}</span>
														<img src="{{ url('images/site/google-play-badge.svg') }}" alt="{{ t('Available on Google Play') }}">
													</a>
												</div>
												@endif
											</div>
										</div>
									</div>
									<?php
										$footerSocialClass = 'hero-subscribe';
										$footerSocialTitleClass = 'no-margin';
									?>
								@endif

								@if (
									config('settings.social_link.facebook_page_url') or
									config('settings.social_link.twitter_url') or
									config('settings.social_link.google_plus_url') or
									config('settings.social_link.linkedin_url') or
									config('settings.social_link.pinterest_url') or
									config('settings.social_link.instagram_url')
									)
									<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
										<div class="{!! $footerSocialClass !!}">
											<h4 class="footer-title {!! $footerSocialTitleClass !!}">{{ $footer->title5 }}</h4>
											<ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
												{{-- @if (config('settings.social_link.facebook_page_url'))
												<li>
													<a class="icon-color fb" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.facebook_page_url') }}" data-original-title="Facebook">
														<i class="fab fa-facebook"></i>
													</a>
												</li>
												@endif
												@if (config('settings.social_link.twitter_url'))
												<li>
													<a class="icon-color tw" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.twitter_url') }}" data-original-title="Twitter">
														<i class="fab fa-twitter"></i>
													</a>
												</li>
												@endif
												@if (config('settings.social_link.instagram_url'))
													<li>
														<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.instagram_url') }}" data-original-title="Instagram">
															<i class="icon-instagram-filled"></i>
														</a>
													</li>
												@endif
												@if (config('settings.social_link.google_plus_url'))
												<li>
													<a class="icon-color gp" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.google_plus_url') }}" data-original-title="Google+">
														<i class="fab fa-google-plus"></i>
													</a>
												</li>
												@endif
												@if (config('settings.social_link.linkedin_url'))
												<li>
													<a class="icon-color lin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.linkedin_url') }}" data-original-title="LinkedIn">
														<i class="fab fa-linkedin"></i>
													</a>
												</li>
												@endif
												@if (config('settings.social_link.pinterest_url'))
												<li>
													<a class="icon-color pin" title="" data-placement="top" data-toggle="tooltip" href="{{ config('settings.social_link.pinterest_url') }}" data-original-title="Pinterest">
														<i class="fab fa-pinterest-p"></i>
													</a>
												</li>
												@endif --}}
											</ul>
										</div>

									</div>
                                {{-- <footer> --}}
                                    @endif
                                    @php
                                    $fb_footer = App\Models\Fb_foote::where('id',1)->first();
                                    @endphp
                                    <br>
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBusinessJourneynet&tabs&width=280&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=872948206507683" width="280" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                                    </div>
                                {{-- footer  --}}
							</div>
						</div>
					@endif

					<div style="clear: both"></div>
				@endif



				<div class="col-xl-12">
					@if (!config('settings.footer.hide_payment_plugins_logos') and isset($paymentMethods) and $paymentMethods->count() > 0)
						<div class="text-center paymanet-method-logo">
							{{-- Payment Plugins --}}
							@foreach($paymentMethods as $paymentMethod)
								@if (file_exists(plugin_path($paymentMethod->name, 'public/images/payment.png')))
									<img src="{{ url('images/' . $paymentMethod->name . '/payment.png') }}" alt="{{ $paymentMethod->display_name }}" title="{{ $paymentMethod->display_name }}">
								@endif
							@endforeach
						</div>
					@else
						@if (!config('settings.footer.hide_links'))
							<hr>
						@endif
					@endif

					<div class="copy-info text-center">
						© {{ date('Y') }} Business Journey. {{ t('all_rights_reserved') }}.
						@if (!config('settings.footer.hide_powered_by'))
							@if (config('settings.footer.powered_by_info'))
								{{ t('Powered by') }} {!! config('settings.footer.powered_by_info') !!}
							@else

								 Website Consultation by <a href="https://www.himaltech.co.uk/" title="Himal Tech">Himal Tech</a>.
							@endif
						@endif
					</div>
				</div>

			</div>
		</div>
	</div>
</footer>
