@extends('app-admin')
@section('admin-content')
    @include('message')
    <h1>Edit Yor Gallery Category</h1>
    <div class="portlet-body form">
        <div class="col-md-12">

            {!! Form::model($frames,['action' => ['AdminController@postEditFrames'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$id}}'>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Frame</label>
                <div class="col-md-12">
                    {!! Form::text('frame', null, ['placeholder' => 'frame' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Frame Images</label>
                <div class="col-md-12">
                    {!! Form::file('frame_img', null, ['placeholder' => 'frame' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Size</label>
                <div class="col-md-12">
                    {!! Form::text('size', null, ['placeholder' => 'Size' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Price</label>
                <div class="col-md-12">
                    {!! Form::text('price', null, ['placeholder' => 'Price' , 'class' => 'form-control']) !!}
                </div>
            </div>


            <div style="float: right;margin-right: 31px;">
                <button type="submit" class="btn green">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection




