@extends('app-users')
@section('users-content')
    <!-- page slider -->
    <div class="big_slider_place">
        <ul id="example">
            @if(count($homeGallerys) != '')
                @foreach($homeGallerys as $homeGallery)
                    <li class="example_child">
                        <img src="/assets/gallery-images/{{$homeGallery->images}}" width="100%" height="100%" alt="{{$homeGallery->alt}}" />
                        <div class="slide_img_abs">
                            <h3 class="slide_desc_title">
                                {{$homeGallery->name}}
                            </h3>
                            <p class="slide_desc_text">
                                {{$homeGallery->description}}
                            </p>
                            <a href="{{$homeGallery->link}}" class="slide_details">details</a>
                        </div>
                        <div class="slide_img_abs2">
                            <h2 class="slide_img_title">
                                {{$homeGallery->title}}
                            </h2>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <!-- page slider -->

    <!-- mixed images place -->
    <div class="container">
        <div class="mixed_title">
            featured image
            <span class="mixed_title_underline"></span>
        </div>
        <div class="row">
            <div class="row_child">
                <div class="masonry-hybrid-wrap">
                    <input type="number" id="custom-col-gird" value="3">
                    <input type="number" id="custom-col-space" value="20">
                    <div id="masonry_hybrid_demo2">
                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>

                        @foreach($featuresImages as $featuresImage)
                            <div class="grid-item">
                                <a href="#">
                                    <img src="/assets/gallery-category-images/{{$featuresImage->images}}" alt="{{$featuresImage->alt}}">
                                </a>
                                <div class="mixed_images_hover">
                                    <div class="mixed_hover_rel">
                                        <a href="{{action('UsersController@getGalleryInner',$featuresImage->id)}}" class="mixed_order_link">
                                            <button class="mixed_img_order_btn">
                                                order
                                            </button>
                                        </a>
                                        <div class="mixed_img_desc_place">
                                            <p class="mixed_img_title">{{$featuresImage->title}}</p>
                                            <p class="mixed_img_date">
                                                    <span class="mix_img_desc_title">
                                                        date:
                                                    </span>
                                                {{date('d/M/Y', strtotime($featuresImage->created_at))}}
                                            </p>
                                            <p class="mixed_img_desc">
                                                    <span class="mix_img_desc_title">
                                                        place:
                                                    </span>
                                                {{substr($featuresImage->description,0,7)}}..
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <a href="{{action('UsersController@getGalleryCategory')}}" class="mixed_btn_link">
            <button  class="mixed_gallery_btn">
                look gallery
            </button>
        </a>
    </div>
    <!-- mixed images place -->

    <!-- footer place -->
    <footer>
        <div class="footer_news_place">
            <div class="footer_news_title">
                news
                <span class="news_title_underline"></span>
            </div>
            @foreach($news as $new)
                <div class="footer_news">
                    <img src="/assets/news-images/{{$new->images}}" class="news_image" />
                    <h4 class="news_title">
                        {{$new->title}}
                    </h4>
                    <p class="news_text">
                        {{$new->description}}
                    </p>

                    <a href="{{action('UsersController@getNewsInner',$new->id)}}" class="news_details">details</a>
                </div>
            @endforeach
            {{--<div class="footer_news">--}}
            {{--<img src="/assets/users/plugins/images/news2.jpg" class="news_image" />--}}
            {{--<h4 class="news_title">--}}
            {{--world through the eyes of  scott dere--}}
            {{--</h4>--}}
            {{--<p class="news_text">--}}
            {{--Eleven days , luxuty five star hotels and tend camps, all meals, all inclusive ground and air tranportation in Kenya $7,995.--}}
            {{--</p>--}}
            {{--<a href="#" class="news_details">details</a>--}}
            {{--</div>--}}
            {{--<div class="footer_news">--}}
            {{--<img src="/assets/users/plugins/images/news3.jpg" class="news_image" />--}}
            {{--<h4 class="news_title">--}}
            {{--Color magazine about scott--}}
            {{--</h4>--}}
            {{--<p class="news_text">--}}
            {{--Eleven days , luxuty five star hotels and tend camps, all meals, all inclusive ground and air tranportation in all inclusive ground and air tranportation all inclusive ground and air tranportation.--}}
            {{--</p>--}}
            {{--<a href="#" class="news_details">details</a>--}}
            {{--</div>--}}
        </div>
        <div class="follow_us_place">
            <div class="follow_us_title">
                follow us
                <span class="follow_us_title_underline"></span>
            </div>
            <div class="follow_soc_place">
                <a href="https://facebook.com/theelementsofnature/" target="_blank" class="follow_soc_link">
                    <i class="fa fa-facebook f_soc_face" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/scotty607" target="_blank" class="follow_soc_link">
                    <i class="fa fa-twitter f_soc_twi" aria-hidden="true"></i>
                </a>
                <a href="https://www.instagram.com/theelementofnature/" target="_blank" class="follow_soc_link">
                    <i class="fa fa-instagram f_soc_in" aria-hidden="true"></i>
                </a>
                <a href="https://www.flickr.com/photos/tripod607" target="_blank"  class="follow_soc_link">
                    <img src="/assets/users/plugins/images/flickr_logo.png" />
                </a>
                <a href="#"  class="follow_soc_link">
                    <img src="/assets/users/plugins/images/pixoto_logo.png" />
                </a>
                <a target="_blank"  href="https://500px.com/scot" class="follow_soc_link">
                    <img src="/assets/users/plugins/images/logo500.png" />
                </a>
            </div>
        </div>
        <div class='footer_menu_place'>
            <ul class="footer_menu">
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@getGalleryCategory')}}" class="footer_menu_link">gallery</a>
                </li>
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@getWorkShop')}}" class="footer_menu_link">workshop</a>
                </li>
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@getInYourSpace')}}" class="footer_menu_link">in your space</a>
                </li>
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@gerPhotoTour')}}" class="footer_menu_link">photo tour</a>
                </li>
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@getAboutArtist')}}" class="footer_menu_link">about artist</a>
                </li>
                <li class="footer_menu_li">
                    <a href="{{action('UsersController@getConnect')}}" class="footer_menu_link">connect</a>
                </li>
            </ul>
        </div>
        <div class="footer_footer_place">
            <div class="footer_rb_logo_place">
                <span class="made_by">made by</span>
                <a href="http://rbpartners.co/" target="_blank">
                    <img src="/assets/users/plugins/images/r_b_logo.png" class="rblogo" />
                </a>
            </div>
            <div class="footer_partners_place">
					<span class="partners_place_center">
                        @foreach($partners as $partner)
                            <span class="partners_link_place">
							<a href="{{$partner->link}}">
                                <img src="/assets/partners-images/{{$partner->images}}" class="bg_partners_logo" alt="" />
                            </a>
						</span>
                        @endforeach
					</span>
            </div>

            <div class="about_all_images">
                <p class="about_all_images_text">
                    All images on this website  are copyrighted and subject  to usage feesa
                </p>
            </div>
        </div>
    </footer>
    <!-- footer place -->
@endsection


@section('script')
    {{--slider--}}
    {!! HTML::script( asset('assets/users/plugins/js/jquery.zaccordion.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/slider.js') ) !!}
    {{--end slider--}}

    {!! HTML::script( asset('assets/users/plugins/js/isotope.pkgd.min.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/jquery.masonry-hybrid.min.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/mixed.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/music.js') ) !!}

@endsection