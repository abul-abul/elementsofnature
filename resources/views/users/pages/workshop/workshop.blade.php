@extends('app-users')
@section('users-content')
        <!-- small bg place -->
<section class="small_bg_place">
    <img src="/assets/users/plugins/images/small_bg.jpg" class="small_bg" alt="" />
    <div class="small_bg_place_center">
        <h1 class="small_bg_title">
            workshop
            <span class="small_bg_title_underline"></span>
        </h1>
        <p class="small_bg_text">
            simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
        </p>
    </div>
</section>
<!-- small bg place -->

<!-- event place -->
<div class="event_place">
    <div class="event_place_child">
        <img src="/assets/users/plugins/images/scott_img.jpg" class="event_image" alt="" />
        <h2 class="event_title">
            Exclusive One on One Workshops with  Master Photographer Scott Joshua Dere
        </h2>
        <div class="event_date_place">
            <p class="event_p">
                <span>Location:</span>
                NY, Name of Location
            </p>
            <p class="event_p">
                <span>Start:</span>
                26 October 2016
            </p>
        </div>
        <div class="event_btn_place">
            <a href="{{action('UsersController@getWorkShopInner')}}" class="event_learn_link">
                <button class="event_learn_btn">
                    to learn more
                </button>
            </a>
            <a href="#" class="event_send_link">
                <button class="event_send_btn">
                    send request
                </button>
            </a>
        </div>
    </div>
    <div class="event_place_child">
        <img src="/assets/users/plugins/images/scott_img1.jpg" class="event_image" alt="" />
        <h2 class="event_title">
            Kenya Photographic Safari with Scoot Dere & Ted Schiffman/ Animal images
        </h2>
        <div class="event_date_place">
            <p class="event_p">
                <span>Location:</span>
                Kenya
            </p>
            <p class="event_p">
                <span>Duration:</span>
                August 16, 2017- August 27, 2017
            </p>
        </div>
        <div class="event_btn_place">
            <a href="Workshop-Inner.html" class="event_learn_link">
                <button class="event_learn_btn">
                    to learn more
                </button>
            </a>
            <a href="#" class="event_buy_link">
                <button class="event_buy_btn">
                    buy now
                </button>
            </a>
        </div>
    </div>
</div>
<!-- event place -->

<!-- footer place -->
<footer class="category_footer">
    <img src="/assets/users/plugins/images/footer_small_img.jpg" class="footer_img" />
    <h1 class="big_title_place_footer">
        Bringing images of Nature from Outside your Windows and into your home
    </h1>
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