@extends('app-admin')
@section('admin-content')

    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Gallery Images List
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_1" data-toggle="tab">
                            Gallery Images Top Background
                        </a>
                    </li>
                    <li class="tab_url">
                        <a href="#tab_2" data-toggle="tab">
                            Gallery Images Footer Background
                        </a>
                    </li>
                    <li style="margin-left: 294px;">
                        <a style="padding: 0" href="{{action('AdminController@getAddGalleryCategoryImages',$id)}}">
                            <button class="btn btn-info">Add</button>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="col-md-12">
                            <h1>Gallery Categoryis Images List and Frame list</h1>

                            {{-- Items list --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                                    @if(count($galleryCategoryImages) != '')
                                    <div class="portlet box red">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Simple Table
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
                                                        <th>Favourite</th>
                                                        <th>Featured Images</th>
                                                        <th>View Images Frame</th>
                                                        <th>Edit/Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($galleryCategoryImages as $galleryCategoryImage)
                                                    <tr>
                                                        <td>{{$galleryCategoryImage->title}}</td>
                                                        <td>{{substr($galleryCategoryImage->description, 0, 8)}}...</td>
                                                        <td>{{$galleryCategoryImage->alt}}</td>
                                                        <td>
                                                            <img style="width: 114px;height: 56px" src="/assets/gallery-category-images/{{$galleryCategoryImage->images}}" alt="">
                                                        </td>
                                                        <td>
                                                            {!! Form::open(['action' => ['AdminController@getUpdateGalleryCategoryImagesFavourite',$galleryCategoryImage->id],'style'=>'float:left']) !!}
                                                            <button type="submit" class="btn btn-info">
                                                                @if($galleryCategoryImage->favourite == "" || $galleryCategoryImage->favourite == 0)
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
                                                            {!! Form::open(['action' => ['AdminController@getUpdateFuteredImages',$galleryCategoryImage->id],'style'=>'float:left']) !!}
                                                            <button type="submit" class="btn btn-default">
                                                                @if($galleryCategoryImage->featured_images == "" || $galleryCategoryImage->featured_images == 0)
                                                                    <input type="hidden" name="featured_images" value="1">
                                                                    <i style="color: red" class="glyphicon glyphicon-remove"></i>
                                                                @else
                                                                    <input type="hidden" name="featured_images" value="0">
                                                                    <i style="color: green" class="glyphicon glyphicon-ok"></i>
                                                                @endif
                                                            </button>
                                                            {!!Form::close()!!}
                                                        </td>
                                                        <td>
                                                            <a href="{{action('AdminController@getViewGalleryCategoryImgInner',$galleryCategoryImage->id)}}">
                                                                <button type="button" class="btn btn-primary">
                                                                    <i class="glyphicon glyphicon-eye-open"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{action('AdminController@getEditGalleryCategoryImages',$galleryCategoryImage->id)}}">
                                                                <button class="btn green">
                                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                                </button>
                                                            </a>
                                                            <button data-href="{{action('AdminController@getDeleteGalleryCategoryImages',$galleryCategoryImage->id)}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
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
                                        Not Gallery Categoryis Images List and Frame list
                                    @endif
                                    <!-- END SAMPLE TABLE PORTLET-->
                                </div>

                            </div>
                            {{--end Items list--}}

                          </div>
                        </div>

                     <div class="tab-pane" id="tab_1">
                         @if(count($backgrounds) == "")
                             <div class="col-md-12">
                                 {!! Form::open(['action' => ['AdminController@postAddGalleryCategoryImagesBackground'],'files' => 'true',  ]) !!}
                                 <div style="width: 94%;margin-left: 32px;" class="input-group form-group">
                                     <input type="hidden" name="page_id" value="{{ $id }}">
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
                            @endif
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
                                                     <td>{{substr($backgrounds['description'], 0, 8)}}...</td>
                                                     <td>{{$backgrounds['alt']}}</td>
                                                     <td><img style="width:100px;height:47px;" src="/assets/background-images/{{$backgrounds['images']}}"></td>
                                                     <td>
                                                         <a href="{{action('AdminController@getEditInYourSpace',$backgrounds['id'])}}">
                                                             <button class="btn green">
                                                                 <i class="glyphicon glyphicon-pencil"></i>
                                                             </button>
                                                         </a>
                                                         <button data-href="{{action('AdminController@getDeleteHomeBg',$backgrounds['id'])}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger click_del">
                                                             <i class="fa fa-trash-o bigger-120"></i>
                                                         </button>
                                                     </td>
                                                 </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 @else
                                     <h1>Not Backgrount top Image</h1>
                                 @endif
                             </div>

                      </div>
                    <div class="tab-pane" id="tab_2">
                        @if(count($footer) == "")
                            <div class="col-md-12">
                                {!! Form::open(['action' => ['AdminController@postAddFooterBackground'],'files' => 'true',  ]) !!}
                                <input type="hidden" name="role" value="gallery_category_images">
                                <input type="hidden" name="page_id" value="{{ $id }}">
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
                        @endif
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
                                    <h1>Not footer Images</h1>
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