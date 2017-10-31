@extends('app-admin')
@section('admin-content')
    <h1>Edit Frame Size</h1>
    <div class="portlet-body form">
        <div class="col-md-12">
            @foreach($frames as $frame)

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-12" style="margin-top: 12px;">
                        @if($frame->frame != null)
                        <b class="col-md-12">Frame</b>
                        <div class="col-md-10">
                            <input class="form-control tt-input" type="text" value="{{$frame->frame}}">
                        </div>
                        @endif
                        <div class="col-md-10">
                            <b class="col-md-12">Size</b>
                            <input class="form-control tt-input" type="text" value="{{$frame->size}}">
                        </div>
                        <div style="margin-bottom: 50px" class="col-md-10">
                            <b class="col-md-12">Price</b>
                            <input class="form-control tt-input" type="text" value="{{$frame->price}}">
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

