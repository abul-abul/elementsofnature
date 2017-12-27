@extends('app-users')

@section('meta')
    <title>{{ $workshops->title }}</title>
    <meta property="og:title" content="{{ $workshops->title }}" />
    <meta property="og:description" content="{{ $workshops->description }}" />
    <meta property="og:image" content="http://theelementsofnature.com/assets/work-shop-images/{{$workshops->images}}" />
@endsection

@section('users-content')
        <!-- small bg place -->
@if(count($backgrounds) != '')
<section class="small_bg_place">
    <img src="/assets/background-images/{{$backgrounds->images}}" class="small_bg" alt="{{$backgrounds->alt}}" />
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

<!-- event place -->
<div class="event_place">
    <div class="event_place_child">
        <img src="/assets/work-shop-images/{{$workshops->images}}" class="event_image" alt="{{$workshops->alt}}" />
        <p class="event_inner_img_desc">
            {{$workshops->description}}
        </p>
    </div>
    <div class="event_place_child">
        <h2 class="event_title">
            {{$workshops->title}}
        </h2>
        <div class="event_date_place">
            <p class="event_p">
                <span>Location:</span>
                {{$workshops->location}}
            </p>
            <p class="event_p">
                <span>Price:</span>
                {{$workshops->price}}
            </p>
            <p class="event_p">
                <span>Start:</span>
                {{date('d M Y', strtotime($workshops->created_at))}}
            </p>
        </div>
        <div class="topics_covered_place">
            <h3 class="topics_covered">topics covered</h3>
            <div class="topics_covered_desc_place">
                <div class="covered_desc_child">
                    @foreach($skills as $skill)
                    <p class="covered_desc">
                        {{$skill->skill}}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="#" class="topics_covered_link">
            <button class="topics_covered_send_btn">
                send request
            </button>
        </a>
    </div>
    <div class="event_soc_place">
        <a onclick="shareFbPage()" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/face_link.png" />
        </a>
        <a onclick="window.open('http://twitter.com/share?url={{ $url }}&text={{ $workshops->title }}','name','width=600,height=400')" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/twi_link.png" />
        </a>
        <a onclick="window.open('http://plus.google.com/share?url={{ $url }}','name','width=600,height=400')" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/pin_link.png" />
        </a>
    </div>
</div>
<!-- event place -->




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