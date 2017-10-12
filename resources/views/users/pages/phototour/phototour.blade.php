@extends('app-users')

@section('meta')
    <title>{{ $phototours['photo'][0]->title }}</title>
    <meta property="og:title" content="{{ $phototours['photo'][0]->title }}" />
    <meta property="og:description" content="{{ $phototours['photo'][0]->description }}" />
    <meta property="og:image" content="http://theelementsofnature.com/assets/photo-tour-images/{{$phototours['photo'][0]->images}}" />
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

@foreach($phototours['photo'] as $key=>$phototour)
        <div class="event_place2">
            <div class="event_place_child">
                <img src="/assets/photo-tour-images/{{$phototour->images}}" class="event_image2" alt="{{$phototour->alt}}" />
                <div class="topics_covered_place2">
                    <h3 class="topics_covered2">workshop Topics Covered</h3>
                    <div class="topics_covered_desc_place">
                        <div class="covered_desc_child">
                            @foreach($phototours['skill'] as $skill_key=>$skill)
                                @if($key == $skill_key)
                                    @foreach($skill as $ski)
                                    <p class="covered_desc">
                                        {{$ski->skill}}
                                    </p>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        <p class="event_inner_img_desc2">
                           {{$phototour->description}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="event_place_child">
                <h2 class="event_title">
                    {{$phototour->title}}
                </h2>
                <div class="event_date_place2">
                    <p class="event_p">
                        <span>Location:</span>
                       {{$phototour->location}}
                    </p>
                    <p class="event_p">
                        <span>Start:</span>
                        {{date('d M Y', strtotime($phototour->created_at))}}
                    </p>
                    <p class="event_p">
                        <span>Tour Price:</span>
                        7995 USD
                    </p>
                    <p class="event_p">
                        <span>Workshop Price:</span>
                        980 USD
                    </p>
                </div>
                <p class="event_inner_img_desc3">
                    {{$phototour->description}}
                </p>
                <a href="#" class="topics_covered_link2">
                    <button class="topics_covered_send_btn2">
                        send request
                    </button>
                </a>

            </div>
        </div>

@endforeach

    <div class="event_soc_place">
        <a onclick="shareFbPage()" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/face_link.png" />
        </a>
        <a onclick="window.open('http://twitter.com/share?url={{ $url }}&text={{ $phototours['photo'][0]->title }}','name','width=600,height=400')" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/twi_link.png" />
        </a>
        <a onclick="window.open('http://plus.google.com/share?url={{ $url }}','name','width=600,height=400')" href="#" class="event_soc_link">
            <img src="/assets/users/plugins/images/pin_link.png" />
        </a>
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
<!-- footer place -->

@endsection