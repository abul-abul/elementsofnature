@extends('app-users')
@section('users-content')
        <!-- page slider -->
@if(count($gallerys) != '')
<div class="big_slider_place smallslider">
    <ul id="example">
        @foreach($gallerys as $gallerys)
        <li class="example_child">
            <img src="/assets/gallery-category-images/{{$gallerys->images}}" width="100%" height="100%" alt="{{$gallerys->alt}}" />
            <div class="slide_img_abs2">
                <h2 class="slide_img_title2">
							<span class="slide_title_border">
							{{$gallerys->title}}
							</span>
                </h2>
                <a href="{{action('UsersController@getGalleryCategoryImages',$gallerys->id)}}" class="small_order_link">
                    <button class="smallslider_order_btn">
                        look gallery
                    </button>
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif
<!-- page slider -->

<!-- footer place -->
@if($footer != '')
<footer class="category_footer">
    <img src="/assets/footer-images/{{$footer->images}}" class="footer_img" alt="{{$footer->alt}}"/>
    <h1 class="big_title_place_footer">
        {{$footer->title}}
    </h1>
    <div class="category_footer_footer">
        <div class="cfooter_menu_place">
            <ul class="cfooter_menu">
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@getGalleryCategory')}}" class="cfooter_link">gallery</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@getWorkShop')}}" class="cfooter_link">workshop</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@getInYourSpace')}}" class="cfooter_link">in your space</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@gerPhotoTour')}}" class="cfooter_link">photo tour</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@getAboutArtist')}}" class="cfooter_link">about artist</a>
                </li>
                <li class="cfoter_menu_li">
                    <a href="{{action('UsersController@getConnect')}}" class="cfooter_link">connect</a>
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
@endif
@endsection


@section('script')
    {{--slider--}}
    {!! HTML::script( asset('assets/users/plugins/js/jquery.zaccordion.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/slider.js') ) !!}
    {{--end slider--}}


@endsection