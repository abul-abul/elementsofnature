@extends('app-users')
@section('users-content')
        <!-- small bg place -->
@if($backgrounds != '')
<section class="small_bg_place">
    <img src="/assets/background-images/{{$backgrounds->images}}" class="small_bg" alt="" />
    <div class="small_bg_place_center">
        <h1 class="small_bg_title">
            {{$backgrounds->title}}
            <span class="small_bg_title_underline"></span>
        </h1>
        <p class="small_bg_text">
            {{$backgrounds->description}}
        </p>
    </div>
</section>
@endif
<!-- small bg place -->

<!-- small menu -->
{{--<div class="small_menu_place">--}}
    {{--<ul class="small_menu">--}}
        {{--<li class="small_menu_li">--}}
            {{--<a href="#" class="small_menu_link">--}}
                {{--predators--}}
            {{--</a>--}}
            {{--<span class="small_menu_abs"></span>--}}
        {{--</li>--}}
        {{--<li class="small_menu_li">--}}
            {{--<a href="#" class="small_menu_link">--}}
                {{--flight--}}
            {{--</a>--}}
            {{--<span class="small_menu_abs"></span>--}}
        {{--</li>--}}
        {{--<li class="small_menu_li">--}}
            {{--<a href="#" class="small_menu_link">--}}
                {{--portrait art--}}
            {{--</a>--}}
            {{--<span class="small_menu_abs"></span>--}}
        {{--</li>--}}
        {{--<li class="small_menu_li">--}}
            {{--<a href="#" class="small_menu_link">--}}
                {{--wilderness--}}
            {{--</a>--}}
            {{--<span class="small_menu_abs"></span>--}}
        {{--</li>--}}
        {{--<li class="small_menu_li">--}}
            {{--<a href="#" class="small_menu_link">--}}
                {{--fine art--}}
            {{--</a>--}}
            {{--<span class="small_menu_abs"></span>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</div>--}}
<!-- small menu -->

<!-- standart images place -->
<div class="standart_img_place">
    @foreach($galleryCategoryImages as $galleryCategoryImage)

    <div class="standart_img_parent">
        <img src="/assets/gallery-category-images/{{$galleryCategoryImage->images}}" class="standert_img" alt="{{$galleryCategoryImage->alt}}" />
        <div class="art_fav_place">
            @if($galleryCategoryImage->favourite)
                <span class="art_fav_star">
                    <img src="/assets/users/plugins/images/fav_star.png" id="fav_star" />
                </span>

                <span class="art_fav_text">
                    artist favorit
                </span>
            @endif
        </div>
        <div class="standart_order_place">
            <a href="{{action('UsersController@getGalleryInner',$galleryCategoryImage->id)}}" class="standart_order_link">
                <button class="standart_order_btn">
                    order
                </button>
            </a>
        </div>
        <div class="mixed_img_desc_place">
            <p class="mixed_img_title">{{$galleryCategoryImage->title}}</p>
            <p class="mixed_img_date">
      					<span class="mix_img_desc_title">
      						date:
      					</span>
                {{date('d/M/Y', strtotime($galleryCategoryImage->created_at))}}
            </p>
            <p class="mixed_img_desc">
      					<span class="mix_img_desc_title">
      						place:
      					</span>
                {{substr($galleryCategoryImage->description, 0, 8)}}...
            </p>
        </div>
    </div>
    @endforeach


    {{--<div class="look_more_place">--}}
				{{--<span>--}}
					{{--<a href="#" class="look_more_link">look more</a>--}}
					{{--<img src="/assets/users/plugins/images/look_more.png" class="loadimg"/>--}}
				{{--</span>--}}
    {{--</div>--}}
</div>
<!-- standart images place -->

<!-- yellow place 3 photos-->
<div class="footer_top_place">
    <div class="footer_top_place_center">
        @foreach($news as $new)
            <a href="{{action('UsersController@getNewsInner',$new->id)}}">
            <div class="footer_top_images">
                <div class="footer_top_abs">
                    <h2 class="footer_top_title">
                        {{$new->title}}
                        <span class="follow_us_title_underline"></span>
                    </h2>
                </div>
                <img src="/assets/news-images/{{$new->images}}" class="footer_top_img" />
            </div>
            </a>
        @endforeach
    </div>
</div>
<!-- yellow place 3 photos-->

<!-- footer place -->
@if($footer != '')
<footer class="product_footer">
    <img src="/assets/footer-images/{{$footer->images}}" class="footer_img" />
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
@endif
@endsection


@section('script')

    {!! HTML::script( asset('assets/users/plugins/js/smallMenuFix.js') ) !!}



@endsection
