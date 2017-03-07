@extends('app-users')
@section('users-content')
        <!-- small bg place -->
<section class="small_bg_place">
    <img src="/assets/users/plugins/images/small_bg1.jpg" class="small_bg" alt="" />
    <div class="small_bg_place_center">
        <h1 class="small_bg_title">
            predators
            <span class="small_bg_title_underline"></span>
        </h1>
        <p class="small_bg_text">
            simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
        </p>
    </div>
</section>
<!-- small bg place -->

<!-- small menu -->
<div class="small_menu_place">
    <ul class="small_menu">
        <li class="small_menu_li">
            <a href="#" class="small_menu_link">
                predators
            </a>
            <span class="small_menu_abs"></span>
        </li>
        <li class="small_menu_li">
            <a href="#" class="small_menu_link">
                flight
            </a>
            <span class="small_menu_abs"></span>
        </li>
        <li class="small_menu_li">
            <a href="#" class="small_menu_link">
                portrait art
            </a>
            <span class="small_menu_abs"></span>
        </li>
        <li class="small_menu_li">
            <a href="#" class="small_menu_link">
                wilderness
            </a>
            <span class="small_menu_abs"></span>
        </li>
        <li class="small_menu_li">
            <a href="#" class="small_menu_link">
                fine art
            </a>
            <span class="small_menu_abs"></span>
        </li>
    </ul>
</div>
<!-- small menu -->

<!-- standart images place -->
<div class="standart_img_place">
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="art_fav_place">
      				<span class="art_fav_star">
      					<img src="/assets/users/plugins/images/fav_star.png" id="fav_star" />
      				</span>
      				<span class="art_fav_text">
      					artist favorit
      				</span>
        </div>
        <div class="standart_order_place">
            <a href="{{action('UsersController@getGalleryInner')}}" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="star_abs">
            <img src="/assets/users/plugins/images/fav_star2.png" id="fav_star" />
        </div>
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="star_abs">
            <img src="/assets/users/plugins/images/fav_star2.png" id="fav_star" />
        </div>
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About place or description About
            </p>
        </div>
    </div>
    <div class="standart_img_parent">
        <img src="/assets/users/plugins/images/standart_img.jpg" class="standert_img" alt="" />
        <div class="standart_order_place">
            <a href="Gallery-inner.html" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">Picture name</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                18 november 2016
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                About place or description About
            </p>
        </div>
    </div>
    <div class="look_more_place">
				<span>
					<a href="#" class="look_more_link">look more</a>
					<img src="/assets/users/plugins/images/look_more.png" class="loadimg"/>
				</span>
    </div>
</div>
<!-- standart images place -->

<!-- yellow place 3 photos-->
<div class="footer_top_place">
    <div class="footer_top_place_center">
        <div class="footer_top_images">
            <div class="footer_top_abs">
                <h2 class="footer_top_title">
                    Kenya photographic safari
                    <span class="follow_us_title_underline"></span>
                </h2>
            </div>
            <img src="/assets/users/plugins/images/news1.jpg" class="footer_top_img" />
        </div>
        <div class="footer_top_images">
            <div class="footer_top_abs">
                <h2 class="footer_top_title">
                    world through the  eyes of scott dere
                    <span class="follow_us_title_underline"></span>
                </h2>
            </div>
            <img src="/assets/users/plugins/images/news2.jpg" class="footer_top_img" />
        </div>
        <div class="footer_top_images">
            <div class="footer_top_abs">
                <h2 class="footer_top_title">
                    Color magazine about  scott
                    <span class="follow_us_title_underline"></span>
                </h2>
            </div>
            <img src="/assets/users/plugins/images/news3.jpg" class="footer_top_img" />
        </div>
    </div>
</div>
<!-- yellow place 3 photos-->

<!-- footer place -->
<footer class="product_footer">
    <img src="/assets/users/plugins/images/product_footer_img.jpg" class="footer_img" />
    <div class="category_footer_footer2">
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

    {!! HTML::script( asset('assets/users/plugins/js/smallMenuFix.js') ) !!}



@endsection
