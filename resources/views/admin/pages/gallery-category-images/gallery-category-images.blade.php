@extends('app-admin')
@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            @include('message')
            <div class="tabbable tabbable-custom boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                    <li class="active tab_url">
                        <a href="#tab_0" data-toggle="tab">
                            Gallery Images
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
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="col-md-12">
                           <div class="row">
                               @include('message')
                                <div class="col-md-6">
                                <!-- BEGIN PORTLET-->
                                        <div class="portlet box yellow-crusta">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Add Gallery Category Images
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                {!! Form::open(['action' => ['AdminController@postAddGalleryCategoryImages'],'files' => 'true', 'id' => 'form-username', 'class'=>'form-horizontal form-bordered' ]) !!}
                                                    <input type="hidden" name="gallery_category_id" value="{{$id}}">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Title</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                    {!! Form::text('title', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                                    {!! Form::textarea('description', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_2','style' => 'width: 340px;height:100px']) !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Alt</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                    {!! Form::text('alt', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_3']) !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-sm-3 control-label">Add Images</label>
                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                                     {!! Form::file('images', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_4']) !!}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn purple"><i class="fa fa-check"></i> Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                </div>





                               <div class="col-md-6">
                                   <!-- BEGIN PORTLET-->
                                   <div class="portlet box green">
                                       <div class="portlet-title">
                                           <div class="caption">
                                               <i class="fa fa-gift"></i>Add Gallery Category Images Frame
                                           </div>
                                           <div class="tools">
                                               <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                           </div>
                                       </div>
                                       <div class="portlet-body form">
                                           {!! Form::open(['action' => ['AdminController@postAddGalleryCategoryInner'],'files' => 'true', 'id' => 'form-username', 'class'=>'form-horizontal form-bordered' ]) !!}
                                           <div class="form-group">
                                                   <label class="col-sm-3 control-label">Category Images</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="gallery_category_images_id" class="form-control input-lg">
                                                                    @foreach($galleryCategoryImages as $galleryCategoryImage)
                                                                        <option value="{{$galleryCategoryImage->id}}">{{$galleryCategoryImage->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-3 control-label">Title</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                {!! Form::text('title', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1']) !!}
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-3 control-label">Description</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                                                {!! Form::textarea('description', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_2','style' => 'width: 340px;height:100px']) !!}
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label class="col-sm-3 control-label">Select Farm or Canvas</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="frame_canvas" class="form-control input-lg">
                                                                    <option value="frame">Frame</option>
                                                                    <option value="canvas">Canvas</option>
                                                                </select>
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label class="col-sm-3 control-label">Size</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="size" class="form-control input-lg">
                                                                    <option value="196/86 sm">196/86 sm</option>
                                                                    <option value="180/90 sm">180/90 sm</option>
                                                                    <option value="176/86 sm">176/86 sm</option>
                                                                    <option value="200/100 sm">200/100 sm</option>
                                                                </select>
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label class="col-sm-3 control-label">Choose Frame</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <select name="frame" class="form-control input-lg">
                                                                    <option name="ash">Ash</option>
                                                                    <option name="noca">Noca</option>
                                                                    <option name="tobaco">Tobaco</option>
                                                                </select>
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label class="col-sm-3 control-label">Price</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                           {!! Form::text('price', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1','style'=>'width: 336px;']) !!}

                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label class="col-sm-3 control-label">Add Images</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;width: 337px">
                                                                <input type="file" name="images">
                                                            </span>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-group ">
                                                   <label class="col-sm-3 control-label">Images Alt</label>
                                                   <div class="col-sm-4">
                                                       <div class="input-group">
                                                           {!! Form::text('alt', null, ['class' => 'form-control tt-input','id' => 'typeahead_example_1','style'=>'width: 336px;']) !!}

                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="form-actions">
                                                   <div class="row">
                                                       <div class="col-md-offset-3 col-md-9">
                                                           <button type="submit" class="btn purple"><i class="fa fa-check"></i> Submit</button>
                                                       </div>
                                                   </div>
                                               </div>
                                           {!! Form::close() !!}
                                       </div>
                                   </div>

                               </div>
                           </div>




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
                                                        <th>View Images Frame</th>
                                                        <th>Edit/Delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($galleryCategoryImages as $galleryCategoryImage)
                                                    <tr>
                                                        <td>{{$galleryCategoryImage->title}}</td>
                                                        <td>{{$galleryCategoryImage->description}}</td>
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
1
                      </div>
                    <div class="tab-pane" id="tab_2">
2
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