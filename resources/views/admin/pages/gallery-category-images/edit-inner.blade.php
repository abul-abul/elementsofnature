@extends('app-admin')
@section('admin-content')
    @include('message')
    <h1>Edit Your Gallery Category Images Frame</h1>
    <div class="portlet-body form">
        <div class="col-md-12">

            {!! Form::model($imageFrame,['action' => ['AdminController@postEditGalleryCategoryImagesInner'] ,'files' =>true ] ) !!}
            <input name="id" type="hidden" value='{{$imageFrame->id}}'>
            <input name="gallery_category_images_id" type="hidden" value="{{$imageFrame->gallery_category_images_id}}">
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('title', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Title</label>
                <div class="col-md-12">
                    {!! Form::text('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Size</label>
                <div class="col-md-12">
                    <select class="form-control input-lg" name="size">
                        <option  selected="{{$imageFrame->size}}" value="{{$imageFrame->size}}">{{$imageFrame->size}}</option>
                        <option value="196/86 sm">196/86 sm</option>
                        <option value="180/90 sm">180/90 sm</option>
                        <option value="176/86 sm">176/86 sm</option>
                        <option value="200/100 sm">200/100 sm</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">	Frame or Canvas</label>
                <div class="col-md-12">
                    <select class="form-control input-lg" name="frame_canvas">
                        <option  selected="{{$imageFrame->frame_canvas}}" value="{{$imageFrame->frame_canvas}}">{{$imageFrame->frame_canvas}}</option>

                        <option value="frame">Frame</option>
                        <option value="canvas">Canvas</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Choose Frame</label>
                <div class="col-md-12">
                    <select name="frame" class="form-control input-lg">
                        <option  selected="{{$imageFrame->frame}}" value="{{$imageFrame->frame}}">{{$imageFrame->frame}}</option>
                        <option name="ash">Ash</option>
                        <option name="noca">Noca</option>
                        <option name="tobaco">Tobaco</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Price</label>
                <div class="col-md-12">
                    {!! Form::text('price', null, ['placeholder' => 'Price' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Alt</label>
                <div class="col-md-12">
                    {!! Form::text('alt', null, ['placeholder' => 'Alt' , 'class' => 'form-control']) !!}
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