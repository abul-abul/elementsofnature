@extends('app-admin')
@section('style')
    {!! HTML::style( asset('assets/admin/plugins/assets/global/plugins/dropzone/css/dropzone.css')) !!}
@endsection


@section('admin-content')
    <div class="col-md-12">
        <p>
						<span class="label label-danger">
						NOTE: </span>
            &nbsp; This plugins works only on Latest Chrome, Firefox, Safari, Opera & Internet Explorer 10.
        </p>
        {!! Form::open(['action' => ['AdminController@postAddGallery'],'class' => 'dropzone','id'=>'dropzone' ]) !!}
        {{--<form action="../../assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">--}}
        {{--</form>--}}
        {!!Form::close()!!}
    </div>
@endsection


@section('script')
    {!! HTML::script( asset('assets/admin/plugins/assets/global/plugins/dropzone/dropzone.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/assets/admin/pages/scripts/form-dropzone.js') ) !!}
@endsection