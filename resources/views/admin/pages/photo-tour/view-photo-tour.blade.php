@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Photo Tour
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Photo Tour
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
                                                            <th>Location</th>
                                                            <th>Images</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$photoToure->title}}</td>
                                                            <td>{{$photoToure->description}}</td>
                                                            <td>{{$photoToure->location}}</td>
                                                            <td>
                                                                <img style="width: 114px;height: 56px" src="/assets/photo-tour-images/{{$photoToure->images}}" alt="">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

