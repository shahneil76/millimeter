<!--begin::Aside-->
<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto " id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ route('admin.home') }}" class="brand-logo">
            <img alt="Logo" src="{{ asset('assets/admin/media/logos/logo-light.png') }}" />
        </a>
        <!--end::Logo-->

        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span
                class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Navigation/Angle-double-left.svg') }}--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                    </g>
                </svg><!--end::Svg Icon--></span> </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav ">
                <li class="menu-item {{ Route::currentRouteName() == 'admin.home' || Route::currentRouteName() == 'root' ? 'menu-item-active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.home') }}" class="menu-link "><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Layers.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Dashboard</span></a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'admin.specification.index' ? 'menu-item-active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.specification.index') }}" class="menu-link "><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Layers.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / Navigation / Double-check</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) " />
                                    <path
                                        d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) " />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Specifications</span></a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'admin.category.index' ? 'menu-item-active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.category.index') }}" class="menu-link "><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Layers.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / Layout / Layout-4-blocks</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Category</span></a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'admin.product.index' ? 'menu-item-active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.product.index') }}" class="menu-link "><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Layers.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / Home / Box</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M4,7 L20,7 L20,19.5 C20,20.3284271 19.3284271,21 18.5,21 L5.5,21 C4.67157288,21 4,20.3284271 4,19.5 L4,7 Z M10,10 C9.44771525,10 9,10.4477153 9,11 C9,11.5522847 9.44771525,12 10,12 L14,12 C14.5522847,12 15,11.5522847 15,11 C15,10.4477153 14.5522847,10 14,10 L10,10 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="4"
                                        rx="1" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Product</span></a>
                </li>

                <li class="menu-item  menu-item-submenu {{ Route::currentRouteName() == 'admin.contactus.channel' || Route::currentRouteName() == 'admin.contactus.part' || Route::currentRouteName() == 'admin.work.with.us' ? 'menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;"
                        class="menu-link menu-toggle"><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Bucket.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / Files / File</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" x="6" y="11" width="9" height="2"
                                        rx="1" />
                                    <rect fill="#000000" x="6" y="15" width="5" height="2"
                                        rx="1" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Contact Forms</span><i
                            class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ Route::currentRouteName() == 'admin.contactus.channel' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.contactus.channel') }}"
                                    class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Channel Partner</span></a></li>
                            <li class="menu-item {{ Route::currentRouteName() == 'admin.contactus.part' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.contactus.part') }}"
                                    class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Part Of Our Journey</span></a></li>
                            <li class="menu-item {{ Route::currentRouteName() == 'admin.work.with.us' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.work.with.us') }}"
                                    class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Work With Us</span></a></li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item  menu-item-submenu {{ Route::currentRouteName() == 'admin.media.index' || Route::currentRouteName() == 'admin.media.create' || Route::currentRouteName() == 'admin.media.edit' || Route::currentRouteName() == 'admin.tag.index' ? 'menu-item-open' : '' }}"
                    aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;"
                        class="menu-link menu-toggle"><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Bucket.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / Files / File</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" x="6" y="11" width="9" height="2"
                                        rx="1" />
                                    <rect fill="#000000" x="6" y="15" width="5" height="2"
                                        rx="1" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Media</span><i
                            class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item {{ Route::currentRouteName() == 'admin.media.index' || Route::currentRouteName() == 'admin.media.create' || Route::currentRouteName() == 'admin.media.edit' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.media.index') }}"
                                    class="menu-link "><i class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Media</span></a></li>
                            <li class="menu-item {{ Route::currentRouteName() == 'admin.tag.index' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true"><a href="{{ route('admin.tag.index') }}" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tags</span></a></li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item {{ Route::currentRouteName() == 'admin.setting' ? 'menu-item-active' : '' }}"
                    aria-haspopup="true"><a href="{{ route('admin.setting') }}" class="menu-link "><span
                            class="svg-icon menu-icon"><!--begin::Svg Icon | path:{{ asset('assets/admin/media/svg/icons/Design/Layers.svg') }}--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <title>Stockholm-icons / General / Settings-2</title>
                                <desc>Created with Sketch.</desc>
                                <defs />
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                        fill="#000000" />
                                </g>
                            </svg><!--end::Svg Icon--></span><span class="menu-text">Settings</span></a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside-->
