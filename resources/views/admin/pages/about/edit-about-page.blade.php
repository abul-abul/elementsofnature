@extends('app-admin')
@section('admin-content')
    @include('message')
    <h1>Edit Your Gallery Category Images Frame</h1>
    <div class="portlet-body form">
        <div class="col-md-12">

            {!! Form::model($about,['action' => ['AdminController@postEditAbout'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$about->id}}'>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('video', null, ['placeholder' => 'Video' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Description 1</label>
                <div class="col-md-12">
                    {!! Form::textarea('description1', null, ['placeholder' => 'Description 1' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Description 2</label>
                <div class="col-md-12">
                    {!! Form::textarea('description2', null, ['placeholder' => 'Description 2' , 'class' => 'form-control']) !!}
                </div>
            </div>



            <div style="float: right;margin-right: 31px;">
                <button type="submit" class="btn green">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>







@endsection