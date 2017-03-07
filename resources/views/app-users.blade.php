<html>
<head>
    <title>HomePage</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! HTML::style( asset('assets/users/plugins/font-awesome/css/font-awesome.css')) !!}
    {!! HTML::style( asset('assets/users/plugins/css/font-face.css')) !!}
    {!! HTML::style( asset('assets/users/plugins/css/style.css')) !!}



</head>
<body>
<!-- big background page -->
@if(isset($hoveNavigator))
<section class="page_bg_place">
    <img src="/assets/users/plugins/images/big_bg.jpg" class="big_bg" alt=""/>
    <div class="bg_abs_menu_place">
        <div class="bg_rel_menu_place">
            <ul class="bg_hide_menu">
                <li class="bg_hide_menu_li">
                    <a href="{{action('UsersController@getGalleryCategory')}}" class="bg_hide_links">
                        gallery
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="Workshop.html" class="bg_hide_links">
                        workshop
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="In-Your-Space.html" class="bg_hide_links">
                        in your space
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="Photo-Tour-Inner.html" class="bg_hide_links">
                        photo tour
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="About.html" class="bg_hide_links">
                        about artist
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="Contact.html" class="bg_hide_links">
                        connect
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
            </ul>
            <div class="bg_hide_soc_place">
                <ul class="bg_hide_soc">
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <img src="/assets/users/plugins/images/flickr_logo.png" class="soc_bg_flickr_icon"/>
                        </a>
                    </li>
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <img src="/assets/users/plugins/images/logo500.png" class="soc_bg_500_icon"/>
                        </a>
                    </li>
                    <li class="bg_hide_soc_li">
                        <a href="#" class="hide_soc_a">
                            <img src="/assets/users/plugins/images/pixoto_logo.png" class="soc_bg_pixoto_icon"/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg_burger_abs">
            <div class="bg_burger_rel">
                <span class="bg_burger_btn"></span>
                <span class="bg_burger_btn"></span>
                <span class="bg_burger_btn"></span>
                <img src="/assets/users/plugins/images/burger_closey.png" class="burger_close" />
                <img src="/assets/users/plugins/images/burger_close.png" class="burger_closey" />
            </div>
            <div class="vulume_abs">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
                <i class="fa fa-volume-off" aria-hidden="true"></i>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <ul class="bg_soc_menu_abs">
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
        </li>
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
        </li>
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </li>
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <img src="/assets/users/plugins/images/flickr_logo.png" class="soc_bg_flickr_icon"/>
                <img src="/assets/users/plugins/images/flickr_logoyellow.png" class="soc_bg_flickr_yellow_icon"/>
            </a>
        </li>
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <img src="/assets/users/plugins/images/logo500.png" class="soc_bg_500_icon"/>
                <img src="/assets/users/plugins/images/logo500yellow.png" class="soc_bg_500yellow_icon"/>
            </a>
        </li>
        <li class="bg_soc_menu_links">
            <a href="#" class="soc_menu_a">
                <img src="/assets/users/plugins/images/pixoto_logo.png" class="soc_bg_pixoto_icon"/>
                <img src="/assets/users/plugins/images/pixoto_logoyellow.png" class="soc_bg_pixoto_yellow_icon"/>
            </a>
        </li>
    </ul>
    <div class="big_logo_place">
        <a href="#">
            <img src="/assets/users/plugins/images/big_logo.png" class="big_logo" alt=""/>
        </a>
    </div>
    <h1 class="big_title_place">
        Bringing images of Nature from Outside your Windows and into your home
    </h1>
    <div class="continue_btn_place">
        <div class="continue_btn">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </div>
    </div>
    <div class="bg_partners_place">
				<span class="partners_place_center">
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo1.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo2.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo3.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo4.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo5.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
					<span class="partners_link_place">
						<a href="#">
                            <img src="/assets/users/plugins/images/partners_logo6.png" class="bg_partners_logo" alt="" />
                        </a>
					</span>
				</span>
    </div>
</section>
@endif



@if(isset($hoveNavigator))
<header>
@else
<header class="fixed_header">
@endif
    <div class="header_soc_place">
        <div class="header_soc_center">
            <ul class="header_soc_menu">
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <img src="/assets/users/plugins/images/logo500gray.png" class="h_soc_px500" />
                        <img src="/assets/users/plugins/images/logo500yellow.png" class="h_soc_px500y"/>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <img src="/assets/users/plugins/images/pixoto_logogray.png" class="h_soc_pixoto" />
                        <img src="/assets/users/plugins/images/pixoto_logoyellow.png" class="h_soc_pixotoy"/>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <i class="fa fa-twitter h_soc_twi" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <span class="h_soc_flickr_span"></span>
                        <span class="h_soc_flickr_span"></span>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <i class="fa fa-instagram h_soc_in" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <i class="fa fa-facebook h_soc_face" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="#" class="h_soc_link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header_menu_place">
        <div class="header_menu_center">
            <div class="header_logo_place">
                <a href="home.html">
                    <img src="/assets/users/plugins/images/big_logo.png" class="header_logo" alt="" />
                </a>
            </div>
            <div class="header_menu_hide_place">
                <span class="header_menu_hide_burger"></span>
                <span class="header_menu_hide_burger"></span>
                <span class="header_menu_hide_burger"></span>
                <img src="/assets/users/plugins/images/burger_closeb.png" class="burger_closeb" />
                <ul class="header_hide_menu">
                    <li class="header_hide_menu_li">
                        <a href="{{action('UsersController@getGalleryCategory')}}" class="header_hide_menu_link">
                            gallery
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="Workshop.html" class="header_hide_menu_link">
                            workshop
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="In-Your-Space.html" class="header_hide_menu_link">
                            in your space
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="Photo-Tour-Inner.html" class="header_hide_menu_link">
                            photo tour
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="About.html" class="header_hide_menu_link">
                            about artist
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="Contact.html" class="header_hide_menu_link">
                            connect
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="header_menu">
                <li class="header_menu_child">
                    <a href="{{action('UsersController@getGalleryCategory')}}" class="header_menu_link">gallery</a>
                </li>

                <li class="header_menu_child">
                    <a href="{{action('UsersController@getWorkShop','a')}}" class="header_menu_link">workshop</a>
                </li>
                <li class="header_menu_child">
                    <a href="{{action('UsersController@getInYourSpace')}}" class="header_menu_link">in your space</a>
                </li>
                <li class="header_menu_child">
                    <a href="{{action('UsersController@gerPhotoTour')}}" class="header_menu_link">photo tour</a>
                </li>
                <li class="header_menu_child">
                    <a href="{{action('UsersController@getAboutArtist')}}" class="header_menu_link">about artist</a>
                </li>
                <li class="header_menu_child">
                    <a href="{{action('UsersController@getConnect')}}" class="header_menu_link">connect</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- page header -->

@yield('users-content')

<!-- back to top btn -->
<div class="back_to_top">
    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
</div>

{!! HTML::script( asset('assets/users/plugins/js/jquery.min.js') ) !!}


{!! HTML::script( asset('assets/users/plugins/js/init.js') ) !!}

    @yield('script')

</body>
</html>