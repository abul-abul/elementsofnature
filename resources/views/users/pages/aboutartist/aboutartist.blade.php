@extends('app-users')
@section('users-content')

        <!-- video place -->
<div class="video_place">
    <iframe id="video" src="{{$abouts[0]->video}}" frameborder="0" allowfullscreen></iframe>
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
                {{$abouts[0]->description1}}
            </p>
            <p class="artist_text">
                {{$abouts[0]->description2}}
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
    <div class="footer_news_place">
        @foreach($news as $new)
            <div class="footer_news_2">
                <img src="/assets/news-images/{{$new->images}}" class="news_image" />
                <h4 class="news_title color_black">
                    {{$new->title}}
                </h4>
                <p class="news_text color_black">
                    {{substr($new->description,0,50)}}...
                </p>

                <a href="{{action('UsersController@getNewsInner',$new->id)}}" class="news_details">details</a>
            </div>

        @endforeach
    </div>
</div>
<!-- remainig place -->

<!-- footer place -->
@if(count($footer) != '')
    <footer class="category_footer">
        <img src="/assets/footer-images/{{$footer->images}}" alt="{{$footer->alt}}" class="footer_img" />
        <h1 class="big_title_place_footer">
            {{$footer->title}}
        </h1>
        <div class="category_footer_footer2">
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
                 @foreach($partners as $partner)
                    <span class="partners_link_place">
                        <a href="{{$partner->link}}">
                            <img src="/assets/partners-images/{{$partner->images}}" class="bg_partners_logo" alt="{{$partner->alt}}" />
                        </a>
                    </span>
                @endforeach
            </span>
                {{--<div class="footer_rb_logo_place2">--}}
                    {{--<span class="made_by_white">made by</span>--}}
                    {{--<a href="http://rbpartners.co/" target="_blank">--}}
                        {{--<img src="/assets/users/plugins/images/r_b_logo_white.png" class="rblogo" />--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </footer>
    @endif
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