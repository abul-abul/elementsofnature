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
                {{$backgrounds->description}}
            </p>
        </div>
    </section>
@endif
<!-- small bg place -->

<!-- your space place -->
<div class="your_space_place">
    @foreach($inyourspaces as $inyourspace)
        <div class="space_images_place">
            <img src="/assets/in-your-space-images/{{$inyourspace->images}}" class="space_image" alt="{{$inyourspace->alt}}" />
            <div class="space_image_abs">
                <div class="space_image_rel">
                    <h2 class="space_image_title">
                        {{$inyourspace->title}}
                        <span class="space_title_underline"></span>
                    </h2>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- your space place -->

<!-- soc place -->
<div class="event_soc_place2">
    <h1 class="space_title">
        @if($inYourSpaceTexts)
            {{$inYourSpaceTexts->text}}
        @endif
    </h1>
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
<!-- soc place -->

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