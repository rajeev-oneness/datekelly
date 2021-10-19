<!DOCTYPE html>

<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="utf-8" />
		@php
			$guard = get_guard()
		@endphp
		<title>{{auth()->guard($guard)->user()->site_name}} | @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{asset('admin_theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('admin_theme/html/demo1/dist/assets/plugins/global/plugins.bundle1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin_theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin_theme/html/demo1/dist/assets/css/style.bundle1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('admin_theme/html/demo1/dist/assets/css/themes/layout/header/base/light1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin_theme/html/demo1/dist/assets/css/themes/layout/header/menu/light1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin_theme/html/demo1/dist/assets/css/themes/layout/brand/dark1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin_theme/html/demo1/dist/assets/css/themes/layout/aside/dark1894.css?v=7.1.9')}}" rel="stylesheet" type="text/css" />
		<style>
			.btn-color {
				background-color: #e91482;
				color: #ffffff;
			}
		</style>
		<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
		<!--end::Layout Themes-->
		{{-- <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico" /> --}}
		<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="index.html">
				<img alt="Logo" src="{{asset('/storage/settings/logo') .'/'. auth()->guard($guard)->user()->logo}}" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
						<a href="{{route('admin.dashboard')}}" class="brand-logo">
							<img alt="Logo" src="{{asset('/storage/settings/logo') .'/'. auth()->guard($guard)->user()->logo}}" width="130px"/>
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="{{route('admin.dashboard')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Menus</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Categories</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.category')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.category.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Countries</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.country')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.country.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Cities</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.city')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.city.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Packages</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.package')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.package.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Extras</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.cup.list')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Cup Size</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.body.list')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Body Size</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.origin.list')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Origin</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.language.list')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Language</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Ladies</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.ladies')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.ladies.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Clubs</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.clubs')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.clubs.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Mens</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.mens')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.mens.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Advertisements</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.advertisement')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											{{-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.mens.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li> --}}
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Transactions</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.transaction')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Manage</span>
													<i class="menu-arrow"></i>
												</a>
											</li>
											{{-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
												<a href="{{route('admin.mens.add')}}" class="menu-link menu-toggle">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text text-white">Add</span>
													<i class="menu-arrow"></i>
												</a>
											</li> --}}
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="{{route('admin.report')}}" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-list"></i>
										</span>
										<span class="menu-text text-white">Reports</span>
										<i class="menu-arrow"></i>
									</a>
								</li>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="{{route('admin.site-settings.edit')}}" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="fas fa-cog"></i>
										</span>
										<span class="menu-text text-white">Site Settings</span>
										<i class="menu-arrow"></i>
									</a>
								</li>
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->
									<ul class="menu-nav">
										<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active" data-menu-toggle="click" aria-haspopup="true">
											<a href="javascript:;" class="menu-link menu-toggle">
												<span class="menu-text">Page Header</span>
												<i class="menu-arrow"></i>
											</a>
											
										</li>
									</ul>	
									<!--end::Header Nav-->
								</div>
								<!--end::Header Menu-->
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								
								<!--begin::User-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->guard($guard)->user()->name}}</span>
										<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">A</span>
										</span>
									</div>
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							
							@yield('content')

						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
								<a href="javascript:void(0);" target="_blank" class="text-dark-75 text-hover-primary">Datekelly</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
								<a href="javascript:void(0);" target="_blank" class="nav-link pl-0 pr-5">About</a>
								<a href="javascript:void(0);" target="_blank" class="nav-link pl-0 pr-5">Team</a>
								<a href="javascript:void(0);" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">User Profile 
				<small class="text-muted font-size-sm ml-2">12 messages</small></h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url({{asset('admin_theme/html/demo1/dist/assets/media/users/300_21.jpg')}})"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{auth()->guard($guard)->user()->name}}</a>
						<div class="text-muted mt-1">{{auth()->guard($guard)->user()->site_name}} {{auth()->guard($guard)->user()->name}}</div>
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{auth()->guard($guard)->user()->site_email}}</span>
								</span>
							</a>
							<a href="{{route('logout')}}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Sign Out</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
							<a href="{{route('change.password')}}" class="btn btn-sm btn-light-warning font-weight-bolder py-2 px-5 my-2">Change Password</a>
							<a href="{{route('admin.change.profile')}}" class="btn btn-sm btn-light-success font-weight-bolder py-2 px-5 my-2">Change Profile</a>
							
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Separator-->
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<!--end::Separator-->
				<!--begin::Nav-->
				
				<!--end::Nav-->
				<!--begin::Separator-->
				<div class="separator separator-dashed my-7"></div>
				<!--end::Separator-->
				<!--begin::Notifications-->
				
				<!--end::Notifications-->
			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->
		<!--begin::Quick Cart-->
		
		<!--end::Quick Cart-->
		<!--begin::Quick Panel-->
		
		<!--end::Quick Panel-->
		<!--begin::Chat Panel-->
		
		<!--end::Chat Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		
		<!--begin::Demo Panel-->
		
		<!--end::Demo Panel-->
		
		<!--begin::Global Config(global config for global JS scripts)-->
		
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="{{asset('admin_theme/html/demo1/dist/assets/plugins/global/plugins.bundle1894.js?v=7.1.9')}}"></script>
		<script src="{{asset('admin_theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1894.js?v=7.1.9')}}"></script>
		<script src="{{asset('admin_theme/html/demo1/dist/assets/js/scripts.bundle1894.js?v=7.1.9')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('admin_theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle1894.js?v=7.1.9')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('admin_theme/html/demo1/dist/assets/js/pages/widgets1894.js?v=7.1.9')}}"></script>
		<script src="{{asset('admin_theme/html/demo1/dist/assets/js/pages/crud/file-upload/image-input1894.js?v=7.1.9')}}"></script>
		<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            @if(Session::has('Success'))
                swal('Success','{{Session::get('Success')}}', 'success');
            @elseif(Session::has('Errors'))
                swal('Error','{{Session::get('Errors')}}', 'error');
            @endif

			$(document).ready( function () {
                $('#customDataTable').DataTable();
            } );
        </script>
		@yield('script')
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->

</html>