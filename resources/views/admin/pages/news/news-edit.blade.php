@extends('app-admin')
@section('admin-content')
    @include('message')
    <h1>Edit Your Gallery Category Images Frame</h1>
    <div class="portlet-body form">
        <div class="col-md-12">

            {!! Form::model($news,['action' => ['AdminController@postEditNews'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$news->id}}'>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('title', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Description </label>
                <div class="col-md-12">
                    {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">

                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse News Images… <input name="images" type="file" style="display: none;" multiple="">
                    </span>
                </label>
                <input type="text" class="form-control" readonly="">
            </div>


            <div style="float: right;margin-right: 31px;">
                <button type="submit" class="btn green">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>







@endsection