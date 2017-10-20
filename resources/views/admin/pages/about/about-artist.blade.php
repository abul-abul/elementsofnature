@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            About List
                        </a>
                    </li>

                    <li class="tab_url">
                        <a href="#tab_2" data-toggle="tab">
                            About Footer Background
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">

                        <div class="row">
                            @if(count($abouts) == '')
                            <div class="portlet-title">
                                <div class="caption">
                                   <center>
                                       <h1> Add About </h1>
                                   </center>
                                </div>

                            </div>
                            {!! Form::open(['action' => ['AdminController@postAddAbout'],'files' => 'true',  ]) !!}


                            <div class="col-md-12 form-group">
                                <div class="col-md-12">
                                    {!! Form::text('video', null, ['placeholder' => 'Video' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea('description1', null, ['placeholder' => 'description 1' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea('description2', null, ['placeholder' => 'description 2' , 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div style="float: right;margin-right: 31px;">
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                            {!! Form::close() !!}
                            @endif
                            {{--@if(count($workshops) != '')--}}
                            @if(count($abouts) != '')
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>About LIst
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
                                                        <th>Video</th>
                                                        <th>Description 1</th>
                                                        <th>Description 2</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>{{$abouts[0]->video}}</td>
                                                            <td>{{$abouts[0]->description1}}</td>
                                                            <td>{{$abouts[0]->description2}}</td>


                                                            <td>
                                                                <a href="{{action('AdminController@getEditAbout',$abouts[0]->id)}}">
                                                                    <button class="btn green">
                                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                                    </button>
                                                                </a>
                                                                <button data-href="{{action('AdminController@getDeleteAbout',$abouts[0]->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                                    <i class="fa fa-trash-o bigger-120"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

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









                    <div class="tab-pane" id="tab_2">
                        <div  class="tab-pane" id="tab_1">
                            <div class="col-md-12">
                                @if(count($footer) == "")
                                    {!! Form::open(['action' => ['AdminController@postAddFooterBackground'],'files' => 'true',  ]) !!}
                                    <input type="hidden" name="role" value="about">
                                    <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                        <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Browse Top Backgount Image… <input name="images" type="file" style="display: none;" multiple="">
                                        </span>
                                        </label>
                                        <input type="text" class="form-control" readonly="">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            {!! Form::text('title', null, ['placeholder' => 'background title' , 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12">
                                            {!! Form::text('alt', null, ['placeholder' => 'background alt' , 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div style="float: right;margin-right: 31px;">
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </div>

                            <div class="col-md-12">

                                @if(count($footer) != "")
                                    <h1>Footer Backgound</h1>
                                    <div class="portlet-body" style="display: block;">
                                        <div class="table-scrollable">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Text</th>
                                                    <th>Images</th>
                                                    <th>Date</th>
                                                    <th>

                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr>
                                                    <td>{{$footer->title}}</td>
                                                    <td><img style="width: 100px;height: 56px;" src="/assets/footer-images/{{$footer->images}}" ></td>

                                                    <td>{{date('d/m/Y', strtotime($footer->created_at))}}</td>
                                                    <td>
                                                        <button data-href="{{action('AdminController@getDeleteFooterBacground',$footer->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                            <i class="fa fa-trash-o bigger-120"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <h1>Not Images</h1>
                                @endif
                            </div>

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