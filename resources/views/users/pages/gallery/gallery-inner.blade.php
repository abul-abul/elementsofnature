@extends('app-users')

@section('meta')
    <title>{{ $categoryImagee->title }}</title>
    <meta property="og:title" content="{{ $categoryImagee->title }}" />
    <meta property="og:description" content="{{ $categoryImagee->description }}" />
    <meta property="og:image" content="http://theelementsofnature.com/assets/gallery-category-images/{{$categoryImagee->images}}" />
@endsection

@section('users-content')

        <!-- big small images place -->
@if($imgTop != '')
<div class="big_small_img_place">
    <div class="bs_img_center">
        <div class="bs_img_child">
            <div class="bs_img_small_place">
                <img src="/assets/gallery-category-images/{{$imgTop->images1}}" class="bs_img" alt="" />
            </div>
            <p class="bs_img_desc">
                {{$imgTop->description}}
            </p>
        </div>
        <div class="bs_img_child">
            <div class="bs_img_big_place">
                <img src="/assets/gallery-category-images/{{$imgTop->images2}}" class="bs_img" alt="" />
            </div>
        </div>
    </div>
</div>
@endif
<!-- big small images place -->


<!-- image zoom place -->
@if($categoryImagee != '')
<div class="zoom_img_place">
    <div class="zoom_img">
        <img id="img_02" src="/assets/gallery-category-images/{{$categoryImagee->images}}" />
    </div>
    <div class="zoom_img_desc_place">
        <h1 class="zoom_desc_title">
            {{$categoryImagee->title}}
        </h1>
        <p class="zoom_desc">
            {{$categoryImagee->description}}
        </p>

        <div class="zoom_soc_place">
            <a onclick="shareFbPage()" href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/face_link.png" />
            </a>
            <a onclick="window.open('http://twitter.com/share?url={{ $url }}&text={{ $categoryImagee->title }}','name','width=600,height=400')" href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/twi_link.png" />
            </a>
            <a onclick="window.open('http://plus.google.com/share?url={{ $url }}','name','width=600,height=400')" href="#" class="event_soc_link">
                <img src="/assets/users/plugins/images/pin_link.png" />
            </a>
        </div>
        <div class="zoom_next_last_place">
            <button class="z_next_last_btn">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                @if($id != $firstId)
                <a href="{{action('UsersController@getGalleryInner',$id-1)}}" class="next_last_link">
                    last picture
                </a>
                @else
                    <a href="#" class="next_last_link"> last picture</a>
                @endif
            </button>

            <button class="z_next_last_btn">
                @if($lastId == $id)
                    <a href="#" class="next_last_link">
                        next picture
                    </a>
                @else
                    <a href="{{action('UsersController@getGalleryInner',$id+1)}}" class="next_last_link">
                        next picture
                    </a>
                @endif
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
@endif
<!-- image zoom place -->

<!-- product place -->

<div class="display_option_place">
    <h2 class="display_option_title">
        display option
    </h2>
    <p class="display_option_text">
        Click on a picture for a detailed description of the options below
    </p>
</div>

<div class="product_place">
    @if(count($imageFrames) != '')
        <div class="product_place_center">

            @foreach($imageFrames as $imageFrame)
                <div class="product_images_place">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <div class="product_img_child" data-id="{{$imageFrame->id}}">
                        <img src="/assets/gallery-category-images/{{$imageFrame->images}}" class="product_image" alt="{{$imageFrame->alt}}" />
                        <div class="product_img_abs"></div>
                    </div>
                    <p class="product_text">{{$imageFrame->title}}</p>
                    <p class="product_text_hide">
                        {{$imageFrame->description}}
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</div>
<div class="product_yellow_place">
    <div class="product_yellow_center">
        <h1 class="product_yellow_title">
            Bringing images of Nature from Outside your Windows and into your home
        </h1>
    </div>
</div>
<div class="product_big_image_place">
    <div class="product_big_place_center">
        <div class="p_big_image">
            <img src="" class="product_big_image" alt="" />
        </div>
        <div class="product_big_text_place">
            <h2 class="product_big_title"></h2>
            <p class="product_big_text"></p>
        </div>
        <div class="select_place">
            <div class="select_product_parent">
                <p class="select_title">choose size:</p>
                <div class="product_size">
                    <span class="select_text"></span>
                    <img src="/assets/users/plugins/images/select_down.png" class="select_down" />
                    <img src="/assets/users/plugins/images/select_up.png" class="select_up" />
                    <div class="select_size_place frame_size_ajax">
                        {{--<p class="select_size">196/86 sm</p>--}}
                        {{--<p class="select_size">180/90 sm</p>--}}
                        {{--<p class="select_size">176/86 sm</p>--}}
                        {{--<p class="select_size">200/100 sm</p>--}}
                    </div>
                </div>
            </div>
            <div class="select_product_parent">
                <p class="select_title">choose frame:</p>
                <div class="product_frame">
                    <span class="frame_text"></span>
                    <img src="/assets/users/plugins/images/select_down.png" class="select_down" />
                    <img src="/assets/users/plugins/images/select_up.png" class="select_up" />
                    <div class="select_size_place frame_place_ajax">

                        {{--<p class="select_frame">--}}
                            {{--<img src="/assets/users/plugins/images/select_img1.jpg" class="select_img"/>--}}
                            {{--ash--}}
                        {{--</p>--}}
                        {{--<p class="select_frame">--}}
                            {{--<img src="/assets/users/plugins/images/select_img2.jpg" class="select_img"/>--}}
                            {{--noca--}}
                        {{--</p>--}}
                        {{--<p class="select_frame">--}}
                            {{--<img src="/assets/users/plugins/images/select_img3.jpg" class="select_img"/>--}}
                            {{--tobaco--}}
                        {{--</p>--}}
                    </div>
                </div>
            </div>
            <div class="select_product_parent">
                <p class="select_title">price:</p>
                <div class="product_price">
                    {{--800 usd--}}
                </div>
                {!! Form::open(['action' => ['PaymentController@getPayPage',$id],'files' => 'true', 'method' => 'GET' ]) !!}

                <input type="hidden" name="size" class="paySize">
                <input type="hidden" name="frame" class="payFrame">
                <input type="hidden" name="price" class="payPrice">
                {{--<a href="{{action('PaymentController@getPayPage',$id)}}" class="price_btn_text">--}}
                {{--<a href="{{action('PaymentController@getPayPal')}}" class="price_btn_text">--}}
                    <button type="submit" class="price_btn">
                        buy now
                    </button>
                {{--</a>--}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<!-- product place -->

<!-- footer place -->
@if($footer != '')
<footer class="product_footer">
    <img src="/assets/footer-images/{{$footer->images}}" class="footer_img" />
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
@endif

@endsection



@section('script')

    {!! HTML::script( asset('assets/users/plugins/js/jquery.imageLens.js') ) !!}
    <script>
        window.width = $(window).width();
        $(function () {
            if(width > 600){
                $("#img_02").imageLens({ lensSize: 200 });
            }else if(width <= 600){
                $("#img_02").imageLens({ lensSize: 100 });
            }
        });
    </script>



@endsection

