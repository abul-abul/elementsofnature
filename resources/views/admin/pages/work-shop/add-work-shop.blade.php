@extends('app-admin')
@section('admin-content')
    <div class="portlet box yellow-crusta">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Add Work Shop
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
            </div>
        </div>
    <div class="portlet-body form">
        @include('message')
        {!! Form::open(['action' => ['AdminController@postAddWorkShop'],'files' => 'true', 'id' => 'form-username', 'class'=>'form-horizontal form-bordered' ]) !!}

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
            <label class="col-sm-3 control-label">Location</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                        {!! Form::text('location', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Price</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                        {!! Form::text('price', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Topics Covered</label>
            <div class="col-sm-7">
                <div class="input-group" style="width: 100%">
                    <div class="work_shopp_skills_block">
                        <div class="col-md-6">
                            <span class="twitter-typeahead">
                                {!! Form::text('skill', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_3']) !!}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span><button type="button" class="btn btn-info add_work_shop_scill">Add</button></span>
                        </div><br><br><br>
                    </div>
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
        <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-4">
                <button  type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
@endsection