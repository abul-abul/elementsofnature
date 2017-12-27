@extends('app-users')
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
            <span class="block_text">Scott Joshua Dere</span>
            <span class="block_text">Contact: info@theelementsofnature.com</span>
            <span class="block_text">607 Broadway Cedarhurst, NY 11516</span>
            <span class="block_text">Call: 516 770 343</span>
        </p>
    </div>
</section>
@endif
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
                <a href="https://facebook.com/theelementsofnature/" target="_blank">
                    <img src="/assets/users/plugins/images/connect_face.png"  class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="https://facebook.com/theelementsofnature/" target="_blank" class="connect_link">
                        facebook.com/theelementsofnature
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="https://www.instagram.com/theelementofnature/" target="_blank">
                    <img src="/assets/users/plugins/images/connect_in.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="https://www.instagram.com/theelementofnature/" target="_blank" class="connect_link">
                        instagram.com/theelementofnature/
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="https://www.flickr.com/photos/tripod607" target="_blank">
                    <img src="/assets/users/plugins/images/connect_flic.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a target="_blank" href="https://www.flickr.com/photos/tripod607" class="connect_link">
                        flickr.com/photos/tripod607
                    </a>
                </div>
            </div>
            <div class="connect_soc_place">
                <a href="https://500px.com/scot" target="_blank">
                    <img src="/assets/users/plugins/images/connect_500.png" class="cont_soc_img" alt="" />
                </a>
                <div class="connect_link_place">
                    <a href="https://500px.com/scot" target="_blank" class="connect_link">
                        500px.com/scot
                    </a>
                </div>
            </div>
        </div>
        <div class="connect_center_child">
            <h2 class="connect_title_send">
                send message
                <span class="connect_underline_send"></span>
            </h2>
            @include('message')

            {!! Form::open(['action' => ['UsersController@postConnect']]) !!}
                {!! Form::text('name',null, ['placeholder' => 'Name']) !!}
                {!! Form::text('email',null, ['placeholder' => 'Email']) !!}
                {!! Form::text('team',null, ['placeholder' => 'Theme']) !!}
                {!! Form::textarea('message',null, ['placeholder' => 'message']) !!}

                <input type="submit" value="send" />
            {!!Form::close()!!}

        </div>
    </div>
</div>

<!-- connect place -->

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