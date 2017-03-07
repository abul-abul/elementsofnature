@extends('app-users')
@section('users-content')
        <!-- page slider -->
<div class="big_slider_place smallslider">
    <ul id="example">
        <li class="example_child">
            <img src="/assets/users/plugins/images/slidesmall1.jpg" width="100%" height="100%" alt="" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
							predators
							</span>
                </h2>
                <a href="{{action('UsersController@getGallery')}}" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
        <li class="example_child">
            <img src="/assets/users/plugins/images/slidesmall2.jpg" width="100%" height="100%" alt="" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
							flight
							</span>
                </h2>
                <a href="Gallery.html" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
        <li class="example_child">
            <img src="/assets/users/plugins/images/slidesmall3.jpg" width="100%" height="100%" alt="" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
								portrait art
							</span>
                </h2>
                <a href="Gallery.html" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
        <li class="example_child">
            <img src="/assets/users/plugins/images/slidesmall4.jpg" width="100%" height="100%" alt="" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
								wilderness
							</span>
                </h2>
                <a href="Gallery.html" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
        <li class="example_child">
            <img src="/assets/users/plugins/images/slidesmall5.jpg" width="100%" height="100%" alt="" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
								fine art
							</span>
                </h2>
                <a href="Gallery.html" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
    </ul>
</div>
<!-- page slider -->

<!-- footer place -->

<footer class="category_footer">
    <img src="/assets/users/plugins/images/category_footer.jpg" class="footer_img" />
    <h1 class="big_title_place_footer">
        Bringing images of Nature from Outside your Windows and into your home
    </h1>
    <div class="category_footer_footer">
        <div class="cfooter_menu_place">
            <ul class="cfooter_menu">
                <li class="cfoter_menu_li">
                    <a href="Gallery-Category.html" class="cfooter_link">gallery</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="Workshop.html" class="cfooter_link">workshop</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="In-Your-Space.html" class="cfooter_link">in your space</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="Photo-Tour-Inner.html" class="cfooter_link">photo tour</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="About.html" class="cfooter_link">about artist</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="Contact.html" class="cfooter_link">connect</a>
                </li>
            </ul>
            <p class="cfooter_copyright">
                All images on this website are copyrighted  and subject to usage fees
            </p>
        </div>
        <div class="footer_partners_place2">
					<span class="f_partners_place_center">
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
            <div class="footer_rb_logo_place2">
                <span class="made_by_white">made by</span>
                <a href="http://rbpartners.co/" target="_blank">
                    <img src="/assets/users/plugins/images/r_b_logo_white.png" class="rblogo" />
                </a>
            </div>
        </div>
    </div>
</footer>
@endsection


@section('script')
    {{--slider--}}
    {!! HTML::script( asset('assets/users/plugins/js/jquery.zaccordion.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/slider.js') ) !!}
    {{--end slider--}}


@endsection