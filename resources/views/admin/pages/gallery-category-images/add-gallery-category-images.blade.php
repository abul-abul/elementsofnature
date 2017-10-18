@extends('app-admin')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Gallery Images List
                        </a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-12">
                                    <!-- BEGIN PORTLET-->
                                    <div class="portlet box yellow-crusta">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Add Gallery Category Images
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            {!! Form::open(['action' => ['AdminController@postAddGalleryCategoryImages'],'files' => 'true', 'id' => 'form-username', 'class'=>'form-horizontal form-bordered' ]) !!}
                                            <input type="hidden" name="gallery_category_id" value="{{$id}}">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                            {!! Form::text('title', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                            {!! Form::textarea('description', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_2','style' => 'width: 340px;height:100px']) !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alt</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                            {!! Form::text('alt', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_3']) !!}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="col-sm-3 control-label">Add Images</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                             <input type="file" name="images">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-horizontal form-bordered" >

                                                  <center><h1>Add Gallery Category Frame</h1></center>


                                                    <div class="form-group ">
                                                        <center><b>Add Frame images, size,price,title,description</b></center>
                                                        <label class="control-label"></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 100%">
                                                            <div class="col-md-12" id="price_size_block">
                                                                <div class="added_price_size_block">
                                                                    {{--<div class="col-md-10">--}}
                                                                        {{--{!! Form::text('title_1', null, ['placeholder'=>'Title','class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-2">--}}
                                                                        {{--<button style="margin-left: 31px;" type="button" class="btn green add_size">Add</button>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-10">--}}
                                                                        {{--{!! Form::textarea('description_1', null, ['placeholder'=>'Description','class' => 'form-control tt-input','id' => 'typeahead_example_2', 'style'=>'height:100px;margin-top:15px']) !!}--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-10">--}}
                                                                        {{--<select style="margin-top:15px" name="frame_canvas" class="form-control input-lg frame_select">--}}
                                                                            {{--<option value="frame">Frame</option>--}}
                                                                            {{--<option value="canvas">Canvas</option>--}}
                                                                        {{--</select>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-10 fremae_added">--}}
                                                                        {{--<select style="margin-top:15px" name="frame" class="form-control input-lg coose_frame_block">--}}
                                                                            {{--<option name="ash">Ash</option>--}}
                                                                            {{--<option name="noca">Noca</option>--}}
                                                                            {{--<option name="tobaco">Tobaco</option>--}}
                                                                        {{--</select>--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-5">--}}
                                                                        {{--{!! Form::text('size', null, ['placeholder'=>'Size','class' => 'form-control tt-input','style'=>'margin-top:15px']) !!}--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-5">--}}
                                                                        {{--{!! Form::number('price', null, ['placeholder'=>'Price','class' => 'form-control tt-input','style'=>'margin-top:15px']) !!}--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-5">--}}
                                                                        {{--{!! Form::text('alt_1', null, ['placeholder'=>'Alt','class' => 'form-control tt-input','style'=>'margin-top:15px']) !!}--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-md-5">--}}
                                                                        {{--<input type="file" name="images_inner" style="margin-top:20px">--}}
                                                                    {{--</div>--}}
                                                                    {!! Form::open(['action' => ['AdminController@postAddCatImgInner'],'files' => 'true',  ]) !!}
                                                                    <input type="hidden" name="id" value="{{$id}}">
                                                                        <div class="added_price_size_block">
                                                                            <div class="col-md-10">
                                                                                {!! Form::text('title_1', null, ['placeholder'=>'Title','class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                            {{--<button style="margin-left: 31px;" type="button" class="btn green add_size">Add</button>--}}
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                {!! Form::textarea('description_1', null, ['placeholder'=>'Description','class' => 'form-control tt-input','id' => 'typeahead_example_2', 'style'=>'height:100px;margin-top:15px']) !!}
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <select style="margin-top:15px" name="frame_canvas" class="form-control input-lg frame_select">
                                                                                    <option value="frame">Frame</option>
                                                                                    <option value="canvas">Canvas</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-11 fremae_added">

                                                                                {!! Form::text('frame', null, ['placeholder'=>'Type Frame','class' => 'form-control tt-input coose_frame_block','style'=>'margin-top:15px;width:80%']) !!}
                                                                                <button style="margin: 14px 0 0 35px" type="button" class="btn green add_frame">Add</button>
                                                                            </div>
                                                                            <div class="col-md-11 size_added">
                                                                                {!! Form::text('size', null, ['placeholder'=>'Size','class' => 'form-control tt-input','style'=>'margin-top:15px;width:80%']) !!}
                                                                                <button style="margin: 14px 0 0 35px" type="button" class="btn green add_size_gal_inner">Add</button>

                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                {!! Form::number('price', null, ['placeholder'=>'Price','class' => 'form-control tt-input','style'=>'margin-top:15px']) !!}
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                {!! Form::text('alt_1', null, ['placeholder'=>'Alt','class' => 'form-control tt-input','style'=>'margin-top:15px']) !!}
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <input type="file" name="images_inner" style="margin-top:20px">
                                                                            </div>

                                                                        </div><br><br><br>
                                                                </div><br><br><br>
                                                            </div>
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn purple"><i class="fa fa-check"></i> Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    {!! HTML::script( asset('assets/admin/js/delete.js') ) !!}
    {!! HTML::script( asset('assets/admin/js/tab-url.js') ) !!}


@endsection