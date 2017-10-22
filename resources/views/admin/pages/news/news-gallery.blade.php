@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            News Gallery List
                        </a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">

                        <div class="row">

                            <div class="portlet-title">
                                <div class="caption">
                                    <center>
                                        <h1> Add News Gallery</h1>
                                    </center>
                                </div>

                            </div>
                            {!! Form::open(['action' => ['AdminController@postAddNewsGallery'],'files' => 'true', 'enctype'=>'multipart/form-data' ]) !!}

                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="col-md-12 form-group">
                                    <div style="width: 94%;margin-left: 32px;" class="input-group form-group">

                                        <label class="input-group-btn">
                                            <span class="btn btn-primary">

                                                Browse News Images… <input required type="file" class="form-control" name="images[]" style="display: none;" multiple>

                                               {{--<input name="images" type="file"  multiple="">--}}
                                            </span>
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div style="float: right;margin-right: 31px;">
                                    <button type="submit" class="btn green">Submit</button>
                                </div>
                            {!! Form::close() !!}

                            {{--@if(count($workshops) != '')--}}
                            @if(count($newsGallery) != '')
                                <div class="col-md-12" style="margin-top: 25px;">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>News Gallery LIst
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

                                                        <th>Images</th>
                                                        <th>Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($newsGallery as $new)
                                                        <tr>

                                                            <td><img style="width: 100px" src="/assets/news-images/{{$new->images}}" alt=""></td>
                                                            <td>{{date('d/m/Y', strtotime($new->created_at))}}</td>

                                                            <td></td>
                                                            <td>
                                                                <button data-href="{{action('AdminController@getDeleteNewsGallery',$new->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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

                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>
                            @endif
                            {{--@else--}}
                            {{--<center><h1>Not Work Shop</h1></center>--}}
                            {{--@endif--}}
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>




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