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
                    <li class="tab_url">
                        <a href="#tab_1" data-toggle="tab">
                            Gallery Images Top Background
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_2" data-toggle="tab">
                            Gallery Images Footer Background
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
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Title</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                            {!! Form::text('title1', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                            {!! Form::textarea('description1', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_2','style' => 'width: 340px;height:100px']) !!}
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Select Farm or Canvas</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="frame_canvas" class="form-control input-lg frame_select">
                                                                    <option value="frame">Frame</option>
                                                                    <option value="canvas">Canvas</option>
                                                                </select>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="fremae_added">
                                                        <div class="form-group coose_frame_block">
                                                            <label class="col-sm-3 control-label">Choose Frame</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="frame" class="form-control input-lg">
                                                                    <option name="ash">Ash</option>
                                                                    <option name="noca">Noca</option>
                                                                    <option name="tobaco">Tobaco</option>
                                                                </select>
                                                            </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group ">
                                                        <label class="col-sm-3 control-label">Size/Price/Images</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 100%">
                                                            <div class="col-md-12" id="price_size_block">
                                                                <div class="added_price_size_block">
                                                                    <div class="col-md-4">
                                                                        {!! Form::text('size', null, ['placeholder'=>'Size','class' => 'form-control tt-input']) !!}
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        {!! Form::number('price', null, ['placeholder'=>'Price','class' => 'form-control tt-input']) !!}
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <button type="button" class="btn green add_size">Add</button>
                                                                    </div>
                                                                </div><br><br><br>
                                                            </div>
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-group ">
                                                        <label class="col-sm-3 control-label">Add Images</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                            <input type="file" name="images_inner">
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-sm-3 control-label">Images Alt</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                {!! Form::text('alt1', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1','style'=>'width: 336px;']) !!}
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





                    <div class="tab-pane" id="tab_1">
                        <div class="col-md-12">
                            <div class="row">b</div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="col-md-12">
                            <div class="row">c</div>
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