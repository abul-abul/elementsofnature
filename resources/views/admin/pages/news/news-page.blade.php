@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            News List
                        </a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">

                        <div class="row">

                                <div class="portlet-title">
                                    <div class="caption">
                                        <center>
                                            <h1> Add News </h1>
                                        </center>
                                    </div>

                                </div>
                                {!! Form::open(['action' => ['AdminController@postAddNews'],'files' => 'true',  ]) !!}


                                <div class="col-md-12 form-group">
                                    <div class="col-md-12">
                                        {!! Form::text('title', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-12">
                                        {!! Form::textarea('description', null, ['placeholder' => 'description' , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div style="width: 94%;margin-left: 32px;" class="input-group form-group">

                                        <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Browse News Images… <input name="images" type="file" style="display: none;" multiple="">
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
                            @if(count($news) != '')
                                <div class="col-md-12" style="margin-top: 25px;">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>News LIst
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
                                                        <th>title</th>
                                                        <th>Description </th>
                                                        <th>Images</th>
                                                        <th>favourite</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($news as $new)
                                                        <tr>
                                                            <td>{{$new->title}}</td>
                                                            <td>{{$new->description}}</td>
                                                            <td><img style="width: 100px" src="/assets/news-images/{{$new->images}}" alt=""></td>


                                                            <td>
                                                                {!! Form::open(['action' => ['AdminController@getUpdateNewsFavourite',$new->id],'method' => 'get', 'style'=>'float:left']) !!}
                                                                <button type="submit" class="btn btn-info">
                                                                    @if($new->favourite == "" || $new->favourite == 0)
                                                                        <input type="hidden" name="favourite" value="1">
                                                                        <i class="glyphicon glyphicon-star-empty"></i>
                                                                    @else
                                                                        <input type="hidden" name="favourite" value="0">
                                                                        <i class="glyphicon glyphicon-star"></i>
                                                                    @endif
                                                                </button>
                                                                {!!Form::close()!!}
                                                            </td>
                                                            <td>
                                                                <a href="{{action('AdminController@getEditNews',$new->id)}}">
                                                                    <button class="btn green">
                                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                                    </button>
                                                                </a>
                                                                <button data-href="{{action('AdminController@getDeleteNews',$new->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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