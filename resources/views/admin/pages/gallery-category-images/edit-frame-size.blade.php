@extends('app-admin')
@section('admin-content')
    <h1>Edit Frame Size</h1>


    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12">
            @foreach($frames as $key => $frame)
                {!! Form::open(['action' => ['AdminController@postEditImgFrame'],'files' => 'true',  ]) !!}
                <input type="hidden" name="id" value="{{$frame->id}}">

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-12" style="margin-top: 12px;">
                        @if($frame->frame != null)
                        <b class="col-md-12">Frame</b>
                        <div class="col-md-10">
                            {!! Form::text('frame', $frame->frame, [ 'class' => 'form-control tt-input']) !!}
                        </div>
                        @endif
                        <div class="col-md-10">
                            <b class="col-md-12">Size</b>
                            {!! Form::text('size', $frame->size, [ 'class' => 'form-control tt-input']) !!}
                        </div>
                        <div style="margin-bottom: 50px" class="col-md-10">
                            <b class="col-md-12">Price</b>
                            {!! Form::text('price', $frame->price, [ 'class' => 'form-control tt-input']) !!}
                        </div>
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 70%">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}
            @endforeach

        </div>
    </div>
@endsection

