@extends('app-users')
@section('users-content')

    <div class="news_place">
        <div class="news_center">
            <div class="news_child">
                <h1 class="news_title color_black">{{$news->title}}</h1>
                <p class="news_text color_black">
                    {{$news->description}}
                </p>
            </div>
            <div class="news_child">
                <img src="/assets/news-images/{{$news->images}}" class="news_img" />
            </div>
        </div>
    </div>


    <div class="slider_place">
        <div class="slider_place_center">
            <div class="gallery_tour">
                <div class="slide gall clear">
                    @foreach($newsGallery as $newsGal)
                        <a href="/assets/news-images/{{$newsGal->images}}" class="slide_link">
                            <div class="img">
                                <img src="/assets/news-images/{{$newsGal->images}}" class="img_light"  />
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    {!! HTML::script( asset('assets/users/plugins/js/scroll_slide.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/lightgallery.js') ) !!}
    {!! HTML::script( asset('assets/users/plugins/js/my-scroll.js') ) !!}
@endsection