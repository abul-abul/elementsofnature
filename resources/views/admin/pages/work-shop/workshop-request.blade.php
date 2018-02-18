@extends('app-admin')
@section('admin-content')


    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Worshop Request List
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="row">
                            @if(count($workshoprequests) != '')
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Worshop Request LIst
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
                                                        <th>View worshop request</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($workshoprequests as $workshoprequest)
                                                        <tr>
                                                            <td>{{$workshoprequest->name}}</td>
                                                            <td>{{$workshoprequest->lastname}}</td>
                                                            <td>{{$workshoprequest->messsge}}</td>
                                                            <td>{{$workshoprequest->email}}</td>
                                                            <td>
                                                                <a href="{{action('AdminController@getWorkshopRequestView',$workshoprequest->workshop_id)}}">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button data-href="{{action('AdminController@getDeleteWorkshopRequest',$workshoprequest->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                                <center><h1>Not worshop Request</h1></center>
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
    {!! HTML::script( asset('assets/admin/js/tab-url.js') ) !!}
@endsection