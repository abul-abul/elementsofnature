@extends('app-admin')
@section('admin-content')
    <h1>Add Frame Size</h1>


    @include('message')
    <div class="portlet-body form">
        <div class="col-md-12" style="margin-bottom: 150px;">

                {!! Form::open(['action' => ['AdminController@postAddImgFrame'],'files' => 'true',  ]) !!}
                <input type="hidden" name="gallery_category_images_id" value="{{$image_id}}">
                <input type="hidden" name="gallery_category_images_inner_id" value="{{$frame_id}}">

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="col-md-12" style="margin-top: 12px;">
                                <b class="col-md-12">Frame</b>
                                <div class="col-md-10">
                                    {!! Form::text('frame', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                                <div class="col-md-10">
                                    <b class="col-md-12">Size</b>
                                    {!! Form::text('size', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                                <div style="margin-bottom: 50px" class="col-md-10">
                                    <b class="col-md-12">Price</b>
                                    {!! Form::text('price', null, [ 'class' => 'form-control tt-input']) !!}
                                </div>
                        </div>
                    </div>
                </div>
                <div style="float: right;width: 70%">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                {!! Form::close() !!}

        </div>




        <div class="table-scrollable" >
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Frame</th>
                    <th>Size</th>
                    <th>Price</th>

                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($frames as $frame)
                    <tr>
                        <td>{{$frame->frame}}</td>
                        <td>{{$frame->size}}</td>
                        <td>{{$frame->price}}</td>
                        <td>
                            <a href="{{action('AdminController@getEditFrames',$frame->id)}}">
                            <button class="btn green">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </button>
                            </a>
                            <button data-href="{{action('AdminController@getDeleteImgFrame',$frame->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                <i class="fa fa-trash-o bigger-120"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>




    {{--modal delete--}}

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Do you want delete this file</h4>
                </div>
                <div class="modal-footer">
                    <a class="del_yes" href=#">
                        <button  class="btn btn-danger delete_modal">Yes</button>
                    </a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    {{--end delete modal--}}
@endsection



@section('script')
    {!! HTML::script( asset('assets/admin/js/delete.js') ) !!}
    {!! HTML::script( asset('assets/admin/js/tab-url.js') ) !!}
@endsection

