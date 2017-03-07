@extends('app-users')
@section('users-content')
        <!-- small bg place -->
<section class="small_bg_place">
    <img src="/assets/users/plugins/images/scott_img2.jpg" class="small_bg" alt="" />
    <div class="small_bg_place_center">
        <h1 class="small_bg_title">
            connect
            <span class="small_bg_title_underline"></span>
        </h1>
        <p class="small_bg_text">
            <span class="block_text">Scott Joshua Dere</span>
            <span class="block_text">Contact: info@theelementsofnature.com</span>
            <span class="block_text">607 Broadway Cedarhurst, NY 11516</span>
            <span class="block_text">Call: 516 770 343</span>
        </p>
    </div>
</section>
<!-- small bg place -->

<!-- connect place -->

<div class="connect_place">
    <div class="connect_place_center">
        <div class="connect_center_child">
            <h2 class="connect_title_follow">
                follow me
                <span class="connect_underline_follow"></span>
            </h2>
            <div class="connect_soc_place">
                <a href="#">
                    <img src="/assets/users/plugins/images/connect_face.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="#" class="connect_link">
                        facebook.com/theelementsofnature
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="#">
                    <img src="/assets/users/plugins/images/connect_in.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="#" class="connect_link">
                        flickr.com/photos/tripod607
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="#">
                    <img src="/assets/users/plugins/images/connect_flic.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="#" class="connect_link">
                        facebook.com/theelementsofnature
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="#">
                    <img src="/assets/users/plugins/images/connect_500.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="#" class="connect_link">
                        flickr.com/photos/tripod607
                    </a>
                </div>
            </div>
        </div>
        <div class="connect_center_child">
            <h2 class="connect_title_send">
                send message
                <span class="connect_underline_send"></span>
            </h2>
            <form action="" method="post">
                <input type="text" placeholder="name" />
                <input type="email" placeholder="e-mail" />
                <input type="text" placeholder="theme" />
                <textarea placeholder="message"></textarea>
                <input type="submit" value="send" />
            </form>
        </div>
    </div>
</div>

<!-- connect place -->

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
<!-- footer place -->
@endsection