@extends('app-admin')

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Home Background
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_1" data-toggle="tab">
                            Partner Images
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_2" data-toggle="tab">
                            Home Gallery
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Home Background Images
                                        </div>

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="col-md-12">
                                        {!! Form::open(['action' => ['AdminController@postHomeBg'],'files' => 'true',  ]) !!}

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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_1">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Add Partners
                                        </div>

                                    </div>
                                </div>

                                <div class="portlet-body form">
                                    <div class="col-md-12">

                                        {!! Form::open(['action' => ['AdminController@postAddPartners'],'files' => 'true',  ]) !!}
                                            <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Browse Partners Image… <input name="images" type="file" style="display: none;" multiple="">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly="">
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div class="col-md-12">
                                                    {!! Form::text('link', null, ['placeholder' => 'Partners Link' , 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div style="float: right;margin-right: 31px;">
                                                <button type="submit" class="btn green">Submit</button>
                                            </div>
                                        {!! Form::close() !!}




                                    <div class="col-md-12">
                                        @if(count($partners) != "")
                                        <h1>Partners List</h1>
                                        <div class="portlet-body" style="display: block;">
                                            <div class="table-scrollable">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Images</th>
                                                        <th>Link</th>
                                                        <th>Date</th>
                                                        <th>
                                                            Delete
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($partners as $partner)
                                                        <tr>
                                                            <td>{{$partner->id}}</td>
                                                            <td><img style="width:100px;height:47px;" src="/assets/partners-images/{{$partner->images}}"></td>

                                                            <td><a target="_blank" href="{{$partner->link}}">{{$partner->link}}</a></td>
                                                            <td>{{date('d/m/Y', strtotime($partner->created_at))}}</td>
                                                            <td>
                                                                <button data-href="{{action('AdminController@getPartnersDelete',$partner->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                                            <h1>Not Partners</h1>
                                        @endif
                                    </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--Home Gallery--}}
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Add Home Gallery Images
                                        </div>

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="col-md-12">

                                        {!! Form::open(['action' => ['AdminController@postAddHomeGallery'],'files' => 'true',  ]) !!}
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('title', null, ['placeholder' => 'Title' , 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('name', null, ['placeholder' => 'Gallery Name' , 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                {!! Form::textarea('description', null, ['placeholder' => 'Description' , 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('alt', null, ['placeholder' => 'Alt' , 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                            <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Browse Gallery Image… <input name="images" type="file" style="display: none;" multiple="">
                                                    </span>
                                            </label>
                                            <input type="text" class="form-control" readonly="">
                                        </div>


                                        <div style="float: right;margin-right: 31px;">
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>


                                    <div class="col-md-12">
                                        @if(count($homeGallerys) != "")
                                            <h1>Gallery List</h1>
                                            <div class="portlet-body" style="display: block;">
                                                <div class="table-scrollable">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Gallery Name</th>
                                                            <th>Description</th>
                                                            <th>Image Alt</th>
                                                            <th>Images</th>
                                                            <th>Date</th>
                                                            <th>

                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($homeGallerys as $homeGallery)
                                                            <tr>
                                                                <td>{{$homeGallery->title}}</td>
                                                                <td>{{$homeGallery->name}}</td>
                                                                <td>{{substr($homeGallery->description,0,7)}}...</td>
                                                                <td>{{$homeGallery->alt}}</td>
                                                                <td><img style="width:100px;height:47px;" src="/assets/gallery-images/{{$homeGallery->images}}"></td>
                                                                <td>{{date('d/m/Y', strtotime($homeGallery->created_at))}}</td>

                                                                <td>
                                                                    {!! Form::open(['action' => ['AdminController@postUpdateFavourite'],'style'=>'float:left']) !!}
                                                                    <button type="submit" class="btn btn-info">
                                                                        <input type="hidden" name="id" value="{{$homeGallery->id}}">
                                                                        @if($homeGallery->favourite == "" || $homeGallery->favourite == 0)
                                                                            <input type="hidden" name="favourite" value="1">
                                                                            <i class="glyphicon glyphicon-star-empty"></i>
                                                                        @else
                                                                            <input type="hidden" name="favourite" value="0">
                                                                            <i class="glyphicon glyphicon-star"></i>
                                                                        @endif
                                                                    </button>
                                                                    {!!Form::close()!!}
                                                                    <a href="{{action('AdminController@getEditHomeGallery',$homeGallery->id)}}">
                                                                        <button class="btn green">
                                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                                        </button>
                                                                    </a>
                                                                    <button data-href="{{action('AdminController@getDeleteHomeGallery',$homeGallery->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                                            <h1>Not Home Gallery</h1>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--end Home Gallery--}}


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