@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Add In your space Top Background
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_1" data-toggle="tab">
                            Add In your space  Images
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_2" data-toggle="tab">
                            Add In your space page text
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_3" data-toggle="tab">
                            Add Footer Images
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="col-md-12">
                            {!! Form::open(['action' => ['AdminController@postAddInYourSpaceBackground'],'files' => 'true',  ]) !!}
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
                                    {!! Form::textarea('description', null, ['placeholder' => 'background description' , 'class' => 'form-control']) !!}
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
                        </div>

                        <div class="col-md-12">

                            @if(isset($backgrounds) && count($backgrounds) != "")
                                <h1>Background Top Image</h1>
                                <div class="portlet-body" style="display: block;">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Background Title</th>
                                                <th>Background Description</th>
                                                <th>Background Alt</th>
                                                <th>Background Images</th>
                                                <th>
                                                    Delete
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$backgrounds['title']}}</td>
                                                    <td>{{$backgrounds['description']}}</td>
                                                    <td>{{$backgrounds['alt']}}</td>
                                                    <td><img style="width:100px;height:47px;" src="/assets/background-images/{{$backgrounds['images']}}"></td>
                                                    <td>
                                                        <a href="{{action('AdminController@getEditInYourSpace',$backgrounds['id'])}}">
                                                            <button class="btn green">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <button data-href="{{action('AdminController@getDeleteInYourSpace',$backgrounds['id'])}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                            <i class="fa fa-trash-o bigger-120"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <h1>Not Partners</h1>
                            @endif
                        </div>
                    </div>


                    <div class="tab-pane" id="tab_1">
                        <div class="col-md-12">
                            {!! Form::open(['action' => ['AdminController@postInYourSpaceImages'],'files' => 'true',  ]) !!}
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
                        </div>
                        <div class="col-md-12">

                            @if(count($inyourspaces) != "")
                                <h1>Background Top Image</h1>
                                <div class="portlet-body" style="display: block;">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Alt</th>
                                                <th>Images</th>
                                                <th>Date</th>
                                                <th>

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($inyourspaces as $inyourspace)
                                                <tr>
                                                    @if($inyourspace->title)
                                                    <td>{{$inyourspace->title}}</td>
                                                    @else
                                                        <td>Not Title</td>
                                                    @endif
                                                    @if($inyourspace->alt)
                                                    <td>{{$inyourspace->alt}}</td>
                                                    @else
                                                        <td>Not Alt</td>
                                                    @endif
                                                    <td><img style="width:100px;height:47px;" src="/assets/in-your-space-images/{{$inyourspace->images}}"></td>
                                                    <td></td>
                                                    <td>
                                                        <a href="{{action('AdminController@getEditInYourSpaceImages',$inyourspace->id)}}">
                                                            <button class="btn green">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <button data-href="{{action('AdminController@getDeleteInYourSpaceImages',$inyourspace->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                            <i class="fa fa-trash-o bigger-120"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <h1>Not Images</h1>
                            @endif
                        </div>
                    </div>


                    <div class="tab-pane" id="tab_2">
                        2
                    </div>

                    <div class="tab-pane" id="tab_3">
                        3
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