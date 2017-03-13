@extends('app-admin')
@section('admin-content')
    @if(count($imageFrames) != "")
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Gallery Category Images Frame
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>alt</th>
                            <th>Images</th>
                            <th>Size</th>
                            <th>Frame or canvas</th>
                            <th>Frame</th>
                            <th>Price</th>
                            <th>Edit/Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($imageFrames as $imageFrame)
                            <tr>
                                <td>{{$imageFrame->title}}</td>
                                <td>{{$imageFrame->description}}</td>
                                <td>{{$imageFrame->alt}}</td>
                                <td>
                                    <img style="width: 114px;height: 56px" src="/assets/gallery-category-images/{{$imageFrame->images}}" alt="">
                                </td>
                                <td>{{$imageFrame->size}}</td>
                                <td>{{$imageFrame->frame_canvas}}</td>
                                <td>{{$imageFrame->frame}}</td>
                                <td>{{$imageFrame->price}}</td>
                                <td>
                                    <a href="{{action('AdminController@getEditGalleryCategoryImagesInner',$imageFrame->id)}}">
                                        <button class="btn green">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </button>
                                    </a>
                                    <button data-href="{{action('AdminController@getDeleteGalleryCategoryImagesInner',$imageFrame->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                        <i class="fa fa-trash-o bigger-120"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
       <h1>Not Gallery Category Images Frame</h1>
    @endif

    {{--delete modal--}}

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