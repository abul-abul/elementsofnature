@extends('app-admin')
@section('admin-content')

<div class="row">
    <div class="col-md-12">
        @include('message')
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <ul class="nav nav-tabs">
                <li class="active tab_url">
                    <a href="#tab_0" data-toggle="tab">
                        Gallery Images
                    </a>
                </li>
                <li class="tab_url">
                    <a href="#tab_1" data-toggle="tab">
                        Gallery Images Top background
                    </a>
                </li>
                <li class="tab_url">
                    <a href="#tab_2" data-toggle="tab">
                        Gallery Images Footer Background
                    </a>
                </li>
                <li>
                <a style="padding: 0" href="{{action("AdminController@getAddGalleryImgInnerPage",$id)}}">
                    <button class="btn btn-info">Add</button>
                </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                        @if(count($imageFrames) != "")
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i>Gallery Category Images Frame
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                                    </a>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>alt</th>
                                            <th>Images</th>
                                            {{--<th>Size</th>--}}
                                            {{--<th>Frame or canvas</th>--}}
                                            {{--<th>Frame</th>--}}
                                            {{--<th>Price</th>--}}
                                            <th>Edit Frame /Edit/ Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($imageFrames as $imageFrame)
                                            <tr>
                                                <td>{{$imageFrame->title}}</td>
                                                <td>{{substr($imageFrame->description,0, 50)}}</td>
                                                <td>{{$imageFrame->alt}}</td>
                                                <td>
                                                    <img style="width: 114px;height: 56px" src="/assets/gallery-category-images/{{$imageFrame->images}}" alt="">
                                                </td>
                                                {{--<td>{{$imageFrame->size}}</td>--}}
                                                {{--<td>{{$imageFrame->frame_canvas}}</td>--}}
                                                {{--<td>{{$imageFrame->frame}}</td>--}}
                                                {{--<td>{{$imageFrame->price}}</td>--}}

                                                <td>
                                                    <a href="{{action('AdminController@getAllFrames',$imageFrame->id)}}">
                                                        <button  type="button"  class="btn btn-warning edit_inner_frame">
                                                            <i class="glyphicon glyphicon-edit"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{action('AdminController@getEditGalleryCategoryImagesInner',[$imageFrame->id,$id])}}">
                                                        <button class="btn green">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <button data-href="{{action('AdminController@getDeleteGalleryCategoryImagesInner',$imageFrame->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                        <i class="fa fa-trash-o bigger-120"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                       <h1>Not Gallery Category Images Frame</h1>
                    @endif
                    </div>

                    <div class="tab-pane" id="tab_1">
                        <div class="col-md-12">
                            <div class="portlet-body form">
                                <div class="col-md-12">
                                    {!! Form::open(['action' => ['AdminController@postAddCatImagesInnerTop'],'files' => 'true',  ]) !!}
                                    <input type="hidden" name="gallery_category_images_inner_id" value="{{$id}}">

                                    <div class="col-md-12 form-group">
                                        <label style="margin-left: 15px">Description</label>
                                        <div class="col-md-12">
                                            {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                                        </div>
                                    </div>


                                    <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Browse Gallery Image 1… <input name="images1" type="file" style="display: none;" multiple="">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label style="margin-left: 15px">Alt 1</label>
                                        <div class="col-md-12">
                                            {!! Form::text('alt1', null, ['placeholder' => 'Alt 1' , 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Browse Gallery Image 2… <input name="images2" type="file" style="display: none;" multiple="">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label style="margin-left: 15px">Alt 1</label>
                                        <div class="col-md-12">
                                            {!! Form::text('alt2', null, ['placeholder' => 'Alt 2' , 'class' => 'form-control']) !!}
                                        </div>
                                    </div>



                                    <div style="float: right;margin-right: 31px;">
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            @if(count($imgTop) != "")
                            <h1>Gallery Category Inner Top Background</h1>
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Alt 1</th>
                                        <th>Images 1</th>
                                        <th>Alt 2</th>
                                        <th>Image 2</th>
                                        <th>
                                            Edit/Delete
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td>
                                            {{$imgTop->description}}
                                        </td>
                                        <td>{{$imgTop->alt1}}</td>
                                        <td><img style="width: 100px;height: 56px;" src="/assets/gallery-category-images/{{$imgTop->images1}}"></td>
                                        <td>{{$imgTop->alt2}}</td>
                                        <td><img style="width: 100px;height: 56px;" src="/assets/gallery-category-images/{{$imgTop->images2}}"></td>

                                        <td>
                                            <button data-href="{{action('AdminController@getDeleteGalCatImgInnerTop',$imgTop->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                <i class="fa fa-trash-o bigger-120"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                               @else
                                <h1>Not Backgrount</h1>
                               @endif
                        </div>
                    </div>







                    <div class="tab-pane" id="tab_2">

                            <div class="col-md-12">
                                {!! Form::open(['action' => ['AdminController@postAddFooterBackground'],'files' => 'true',  ]) !!}
                                <input type="hidden" name="role" value="gallery_category_images_inner">
                                <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                    <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Browse Top Backgount Image… <input name="images" type="file" style="display: none;" multiple="">
                                    </span>
                                    </label>
                                    <input type="text" class="form-control" readonly="">
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="col-md-12">
                                        {!! Form::text('title', null, ['placeholder' => 'background title' , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-12">
                                        {!! Form::text('alt', null, ['placeholder' => 'background alt' , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div style="float: right;margin-right: 31px;">
                                    <button type="submit" class="btn green">Submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="col-md-12">

                                @if(count($footer) != "")
                                    <h1>Footer Backgound</h1>
                                    <div class="portlet-body" style="display: block;">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Text</th>
                                                    <th>Images</th>
                                                    <th>Date</th>
                                                    <th>

                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td>{{$footer->title}}</td>
                                                    <td><img style="width: 100px;height: 56px;" src="/assets/footer-images/{{$footer->images}}" ></td>

                                                    <td>{{date('d/m/Y', strtotime($footer->created_at))}}</td>
                                                    <td>
                                                        <button data-href="{{action('AdminController@getDeleteFooterBacground',$footer->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                            <i class="fa fa-trash-o bigger-120"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <h1>Not footer Images</h1>
                                @endif
                            </div>


                    </div>
            </div>

        </div>
    </div>
</div>










    {{--delete modal--}}
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Do you want delete this file</h4>
                </div>
                <div class="modal-footer">
                    <a class="del_yes" href=#">
                        <button  class="btn btn-danger delete_modal">Yes</button>
                    </a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    {{--end delete modal--}}


    {{-- frame modal --}}

    {{--<div class="modal fade" id="myModal1" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<center>Change Frame</center>--}}
                {{--</div>--}}
                {{--<input type="hidden" content="{{ csrf_token() }}" class="token">--}}
                {{--<div class="modal-body frame_modal">--}}
                    {{--@foreach($frames as $frame)--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="col-md-12">--}}
                                 {{--<div class="col-md-12">--}}
                                     {{--<b class="col-md-12">Frame</b>--}}
                                     {{--<div class="col-md-10">--}}
                                        {{--<input class="form-control tt-input" type="text" value="{{$frame->frame}}">--}}
                                     {{--</div>--}}
                                     {{--<div class="col-md-2">--}}
                                         {{--<button data-name="frame" data-id="{{$frame->id}}" class="btn green edit_frame">Edit</button>--}}
                                     {{--</div>--}}
                                 {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<b class="col-md-12">Size</b>--}}
                                    {{--<div class="col-md-10">--}}
                                        {{--<input class="form-control tt-input" type="text" value="{{$frame->size}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-2">--}}
                                        {{--<button data-name="size"  data-id="{{$frame->id}}"  class="btn green edit_frame">Edit</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}


    {{-- end frame modal --}}
@endsection


@section('script')
    {!! HTML::script( asset('assets/admin/js/delete.js') ) !!}
    {!! HTML::script( asset('assets/admin/js/tab-url.js') ) !!}
@endsection