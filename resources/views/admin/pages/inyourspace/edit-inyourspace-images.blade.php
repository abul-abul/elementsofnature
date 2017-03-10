@extends('app-admin')

@section('admin-content')
    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12">
            {!! Form::model($imYorspaceImage,['action' => ['AdminController@postEditInYourSpaceImages'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$imYorspaceImage->id}}'>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('title', null, ['placeholder' => 'Background Title' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Alt</label>
                <div class="col-md-12">
                    {!! Form::text('alt', null, ['placeholder' => 'Background Alt' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse Background Image… <input name="images" type="file" style="display: none;" multiple="">
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