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
                <label style="margin-left: 15px">Description</label>
                <div class="col-md-12">
                    {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-12 form-group">
                <label style="margin-left: 15px">Size</label>
                <div class="col-md-12">
                    {!! Form::text('size', null, ['placeholder' => 'Size' , 'class' => 'form-control']) !!}

                </div>
            </div>
            @if($imageFrame->frame != '')
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
            @endif
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