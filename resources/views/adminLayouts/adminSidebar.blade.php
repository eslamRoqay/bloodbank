<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item @if(request()->segment(2) == 'dashboard') menu-item-active  @endif"
                aria-haspopup="true">
                <a href="{{url('/dashboard')}}" class="menu-link">
                    <i class="menu-icon flaticon-home">
                        <span></span>
                    </i>
                    <span class="menu-text">{{__('lang.home')}}</span>
                </a>
            </li>

            @can('read-users')
                <li class="menu-item menu-item-submenu @if(request()->segment(2) == 'users') menu-item-open @endif "
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('users')}}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-user"></i>
                        <span class="menu-text">{{__('lang.users')}}</span>
                    </a>
                </li>
            @endcan

            @can('read-admins')
                <li class="menu-item menu-item-submenu @if(request()->segment(2) == 'admins') menu-item-open @endif "
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('admins')}}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-users-1"></i>
                        <span class="menu-text">{{__('lang.admins')}}</span>
                    </a>
                </li>
            @endcan
            @can('read-roles')
                <li class="menu-item menu-item-submenu @if(request()->segment(2) == 'roles') menu-item-open @endif "
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('roles')}}" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon2-notepad"></i>
                        <span class="menu-text">{{__('lang.roles')}}</span>
                    </a>
                </li>
            @endcan
            @can('read-inboxes')
                @php($new=\App\Models\Inbox::where('seen','0')->count())
                <li class="menu-item menu-item-submenu @if(request()->segment(2) == 'inboxes') menu-item-open @endif "
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{url('/inboxes')}}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-envelope"></i>
                        <span class="menu-text">{{__('lang.inboxes')}}</span>
                        <span class="menu-label">
                    @if($new>0)<span class="label label-danger label-inline">{{$new}}</span>@endif
													</span>
                    </a>
                </li>
            @endcan
            @can('read-settings')
                <li class="menu-item menu-item-submenu @if(request()->segment(2) == 'settings') menu-item-open @endif "
                    aria-haspopup="true" data-menu-toggle="hover">
                    <a href="{{route('settings')}}" class="menu-link menu-toggle">
                        <i class="menu-icon fas fa-cog"></i>
                        <span class="menu-text">{{__('lang.settings')}}</span>
                    </a>
                </li>
            @endcan

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
                <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                </div>
            </div>
            <!--end::Header Menu Wrapper-->
            <!--begin::Topbar-->
            <div class="topbar">
                <!--begin::Languages-->
                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                        <span style="cursor: pointer;"
                              class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{__('lang.language')}}</span>
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Dropdown-->
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Nav-->
                        <ul class="navi navi-hover py-4">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="navi-item">
                                    <a class="navi-link" hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                            &nbsp;
                                        @if($properties['native'] == '??????????????')
                                            <span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/133-saudi-arabia.svg" alt="">
													</span>
                                        @else()
                                        <span class="symbol symbol-20 mr-3">
														<img src="assets/media/svg/flags/226-united-states.svg" alt="">
													</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--end::Languages-->
                <!--begin::User-->
                <div class="topbar-item">
                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                         id="kt_quick_user_toggle">
                        <span
                            class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
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
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                @yield('breadcrumb')
                <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
