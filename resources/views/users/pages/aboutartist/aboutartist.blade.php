@extends('app-users')
@section('users-content')
        <!-- video place -->
<div class="video_place">
    <iframe id="video" src="https://www.youtube.com/embed/NrJscNxQoaU" frameborder="0" allowfullscreen></iframe>
    <div class="more_artist_btn">
        <span class="more_artist_text">more about artist</span>
        <i class="fa fa-angle-down about_art" aria-hidden="true"></i>
    </div>
</div>
<!-- video place -->

<!-- artist place -->
<div class="artist_place">
    <img src="/assets/users/plugins/images/about_big.jpg" class="about_big_img" alt="" />
    <div class="artist_abs">
        <div class="artist_rel">
            <div class="artist_rel_abs"></div>
        </div>
    </div>
    <div class="artist_text_place">
        <div class="artist_text_parent">
            <p class="artist_text">
                scott Joshua Dere simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's s
                tandard dummy text ever since the 1500s, when anuknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p class="artist_text">
                scott Joshua Dere simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's s
                tandard dummy text ever since the 1500s, when anuknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
        <div class="event_soc_place">
            <a href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/face_link.png" />
            </a>
            <a href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/twi_link.png" />
            </a>
            <a href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/pin_link.png" />
            </a>
        </div>
    </div>
</div>
<!-- artist place -->

<!-- remainig place -->
<div class="remainig_place">
    <h2 class="remainig_title">
        remainings part will be done after you sen the ather part
    </h2>
</div>
<!-- remainig place -->

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

@section('script')
<script>
    $(document).ready(function(){
        var aboutArtTop = $(".artist_place").offset().top;

        $(".more_artist_text").click(function(){
            $("body").animate({
                scrollTop : aboutArtTop - 100,
            },700);
        });
        $(".about_art").click(function(){
            $("body").animate({
                scrollTop : aboutArtTop - 100,
            },700);
        });
    });
</script>
@endsection