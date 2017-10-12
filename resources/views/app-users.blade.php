<html>
<head>
    {{--<title>HomePage</title>--}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! HTML::style( asset('assets/users/plugins/font-awesome/css/font-awesome.css')) !!}
    {!! HTML::style( asset('assets/users/plugins/css/font-face.css')) !!}
    {!! HTML::style( asset('assets/users/plugins/css/style.css')) !!}
    @yield('meta')



</head>
<body>
<!-- big background page -->
@if(isset($hoveNavigator))
<section class="page_bg_place">
    @if(isset($homeBg) && count($homeBg) != '')
    <img src="/assets/background-images/{{$homeBg->images}}" class="big_bg" alt="{{$homeBg->alt}}"/>
    @endif
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
                    <a href="{{action('UsersController@getWorkShop')}}" class="bg_hide_links">
                        workshop
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="{{action('UsersController@getInYourSpace')}}" class="bg_hide_links">
                        in your space
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="{{action('UsersController@gerPhotoTour')}}" class="bg_hide_links">
                        photo tour
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="{{action('UsersController@getAboutArtist')}}" class="bg_hide_links">
                        about artist
                        <span class="bg_hide_abs"></span>
                    </a>
                </li>
                <li class="bg_hide_menu_li">
                    <a href="{{action('UsersController@getConnect')}}" class="bg_hide_links">
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
        <a href="{{action('UsersController@getHome')}}">
            <img src="/assets/users/plugins/images/big_logo.png" class="big_logo" alt=""/>
        </a>
    </div>
    <h1 class="big_title_place">
        @if(count($homeBg) != '')
        {{$homeBg->title}}
        @endif
    </h1>
    <div class="continue_btn_place">
        <div class="continue_btn">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </div>
    </div>
    <div class="bg_partners_place">
        @if(isset($partners) && count($partners) != 'null')
            <span class="partners_place_center">
                @foreach($partners as $partner)
                <span class="partners_link_place">
                    <a href="{{$partner->link}}">
                        <img src="/assets/partners-images/{{$partner->images}}" class="bg_partners_logo" alt="{{$partner->alt}}" />
                    </a>
                </span>
                @endforeach
            </span>
        @endif
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
                    <a href="{{action('UsersController@getConnect')}}" class="h_soc_link">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="h_soc_menu_child">
                    <a href="{{action('UsersController@getHome')}}" class="h_soc_link">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header_menu_place">
        <div class="header_menu_center">
            <div class="header_logo_place">
                <a href="{{action('UsersController@getHome')}}">
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
                        <a href="{{action('UsersController@getWorkShop')}}" class="header_hide_menu_link">
                            workshop
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="{{action('UsersController@getInYourSpace')}}" class="header_hide_menu_link">
                            in your space
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="{{action('UsersController@gerPhotoTour')}}" class="header_hide_menu_link">
                            photo tour
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="{{action('UsersController@getAboutArtist')}}" class="header_hide_menu_link">
                            about artist
                        </a>
                    </li>
                    <li class="header_hide_menu_li">
                        <a href="{{action('UsersController@getConnect')}}" class="header_hide_menu_link">
                            connect
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="header_menu">
                @if(isset($gallery_category_active))
                <li class="header_menu_child menu_active">
                @else
                <li class="header_menu_child">
                @endif
                    <a href="{{action('UsersController@getGalleryCategory')}}" class="header_menu_link">gallery</a>
                </li>

                @if(isset($activeworkshop))
                    <li class="header_menu_child menu_active">
                @else
                    <li class="header_menu_child">
                @endif
                    <a href="{{action('UsersController@getWorkShop')}}" class="header_menu_link">workshop</a>
                </li>

                @if(isset($activiinyourspace))
                <li class="header_menu_child menu_active">
                @else
                <li class="header_menu_child">
                @endif
                    <a href="{{action('UsersController@getInYourSpace')}}" class="header_menu_link">in your space</a>
                </li>

                @if(isset($activephototour))
                <li class="header_menu_child menu_active">
                @else
                <li class="header_menu_child">
                @endif
                    <a href="{{action('UsersController@gerPhotoTour')}}" class="header_menu_link">photo tour</a>
                </li>


                @if(isset($activeaboutartist))
                <li class="header_menu_child menu_active">
                @else
                <li class="header_menu_child">
                @endif
                    <a href="{{action('UsersController@getAboutArtist')}}" class="header_menu_link">about artist</a>
                </li>

                @if(isset($activeconnect))
                    <li class="header_menu_child menu_active">
                @else
                    <li class="header_menu_child">
                @endif
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

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '290814454758242',
                    xfbml      : true,
                    version    : 'v2.8'
                });
                FB.AppEvents.logPageView();
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

</body>
</html>