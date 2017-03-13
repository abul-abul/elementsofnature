@extends('app-admin')
@section('admin-content')

    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Add Gallery Category
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_1" data-toggle="tab">
                            Add In Footer Background Images
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Add Gallery Category
                                </div>

                            </div>
                        </div>
                        {!! Form::open(['action' => ['AdminController@postAddGalleryCategory'],'files' => 'true',  ]) !!}
                        <input type="hidden" name="role" value="inyourspace">
                        <div style="width: 94%;margin-left: 32px;" class="input-group form-group">

                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse Top Gallery Category Images… <input name="images" type="file" style="display: none;" multiple="">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly="">
                        </div>

                        <div class="col-md-12 form-group">
                            <label style="margin-left: 16px;">Gallery Category Title</label>

                            <div class="col-md-12">
                                {!! Form::text('title', null, ['placeholder' => 'background title' , 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label style="margin-left: 16px;">Gallery Category Alt Images</label>

                            <div class="col-md-12">
                                {!! Form::text('alt', null, ['placeholder' => 'background alt' , 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div style="float: right;margin-right: 31px;">
                            <button type="submit" class="btn green">Submit</button>
                        </div>
                        {!! Form::close() !!}
                        <div class="col-md-12">

                            @if(count($gallery_categorys) != "")
                                <h1>Gallery Category Images</h1>
                                <div class="portlet-body" style="display: block;">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Text</th>
                                                <th>Alt</th>
                                                <th>Images</th>

                                                <th>Date</th>
                                                <th>

                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($gallery_categorys as $gallery_category)

                                                <tr>
                                                    <td>
                                                        <a href="{{action('AdminController@getGalleryCategoryImages',$gallery_category->id)}}">
                                                            {{$gallery_category->title}}
                                                        </a>
                                                    </td>
                                                    <td>{{$gallery_category->alt}}</td>
                                                    <td><img style="width: 100px;height: 56px;" src="/assets/gallery-category-images/{{$gallery_category->images}}" ></td>

                                                    <td>{{date('d/m/Y', strtotime($gallery_category->created_at))}}</td>
                                                    <td>
                                                        <a href="{{action('AdminController@getEditGalleryCategory',$gallery_category->id)}}">
                                                            <button class="btn green">
                                                                <i class="glyphicon glyphicon-pencil"></i>
                                                            </button>
                                                        </a>
                                                        <button data-href="{{action('AdminController@getDeleteGalleryCategory',$gallery_category->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                                <h1>Not Gallery Category Images</h1>
                            @endif
                        </div>
                </div>



                <div  class="tab-pane" id="tab_1">
                        <div class="col-md-12">
                            {!! Form::open(['action' => ['AdminController@postAddFooterBackground'],'files' => 'true',  ]) !!}
                            <input type="hidden" name="role" value="gallery_category">
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