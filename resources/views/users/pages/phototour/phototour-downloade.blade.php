{!! HTML::style( asset('assets/users/plugins/css/style.css')) !!}
    <div class="event_place2">
        <div class="event_place_child">
            <img src="/assets/photo-tour-images/{{$phototour->images}}" class="event_image2" alt="{{$phototour->alt}}" />
            <div class="topics_covered_place2">
                <h3 class="topics_covered2">workshop Topics Covered</h3>
                <div class="topics_covered_desc_place">
                    <div class="covered_desc_child">
                        @foreach($skill as $skill_key=>$skil)
                            <p class="covered_desc">
                                {{$skil->skill}}
                            </p>
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
            </div>
            <p class="event_inner_img_desc3">
                {{$phototour->description}}
            </p>

        </div>
    </div>


