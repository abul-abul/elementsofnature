@extends('app-admin')
@section('admin-content')
    @include('message')
    <h1>Edit Your Work Shop</h1>
    <div class="portlet-body form">
        <div class="col-md-12">

            {!! Form::model($workshops,['action' => ['AdminController@postEditWorkShop'] ,'files' =>true ] ) !!}
            <input type="hidden" name="id" value="{{$workshops->id}}">
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('title', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Price</label>
                <div class="col-md-12">
                    {!! Form::text('price', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Description</label>
                <div class="col-md-12">
                    {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Topics Covered</label>
                <div class="col-md-12">
                    @foreach($skills as $key=>$skill)
                        <input name="skill_{{$key}}" style="margin-top:12px;" type="text" class="form-control" value="{{$skill->skill}}">
                    @endforeach
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('location', null, ['placeholder' => 'Location' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse Gallery Image… <input name="images" type="file" style="display: none;" multiple="">
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