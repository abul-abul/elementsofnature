@extends('app-admin')
@section('admin-content')
    <h1>Edit Frame Size</h1>


    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12">

                {!! Form::open(['action' => ['AdminController@postAddImgFrame'],'files' => 'true',  ]) !!}
                <input type="hidden" name="gallery_category_images_id" value="{{$image_id}}">
                <input type="hidden" name="gallery_category_images_inner_id" value="{{$frame_id}}">

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-12" style="margin-top: 12px;">
                                <b class="col-md-12">Frame</b>
                                <div class="col-md-10">
                                    {!! Form::text('frame', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                                <div class="col-md-10">
                                    <b class="col-md-12">Size</b>
                                    {!! Form::text('size', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                                <div style="margin-bottom: 50px" class="col-md-10">
                                    <b class="col-md-12">Price</b>
                                    {!! Form::text('price', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 70%">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}

        </div>
    </div>
@endsection

