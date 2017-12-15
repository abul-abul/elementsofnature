@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Photo Tour Request List
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="row">
                            @if(count($photoRequests) != '')
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Photo Tour Request LIst
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
                                                        <th>Name</th>
                                                        <th>Lastname</th>
                                                        <th>Message</th>
                                                        <th>Email</th>
                                                        <th>View Photo Tour</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($photoRequests as $photoRequest)
                                                            <tr>
                                                                <td>{{$photoRequest->name}}</td>
                                                                <td>{{$photoRequest->lastname}}</td>
                                                                <td>{{$photoRequest->message}}</td>
                                                                <td>{{$photoRequest->email}}</td>
                                                                <td>
                                                                    <a href="{{action('AdminController@getPhotoToureView',$photoRequest->phototoure_id)}}">
                                                                        <button type="button" class="btn btn-primary">
                                                                            <i class="glyphicon glyphicon-eye-open"></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <button data-href="{{action('AdminController@getDeletePhotoToureRequest',$photoRequest->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                            @else
                                <center><h1>Not Photo Tour Request</h1></center>
                            @endif
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
@endsection