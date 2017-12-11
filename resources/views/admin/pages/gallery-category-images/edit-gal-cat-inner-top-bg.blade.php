@extends('app-admin')

@section('admin-content')

    <h1>Edit Yor Gallery Category Inner Top Background</h1>
    <div class="portlet-body form">
        @include('message')
        <div class="col-md-12">
            {!! Form::model($galCatImg,['action' => ['AdminController@postEditGalleryCategoryImagestopBg'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$galCatImg->id}}'>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Description</label>
                <div class="col-md-12">
                    {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                </div>
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
                    Browse Gallery Image… <input name="images1" type="file" style="display: none;" multiple="">
                </span>
                </label>
                <input type="text" class="form-control" readonly="">
            </div>


            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Alt 2</label>
                <div class="col-md-12">
                    {!! Form::text('alt2', null, ['placeholder' => 'Alt 2' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse Gallery Image… <input name="images2" type="file" style="display: none;" multiple="">
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

