<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Metronic | Login Options - Login Form 1</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    {!! HTML::style( asset('assets/admin/plugins/css/font-awesome.min.css')) !!}

    {!! HTML::style( asset('assets/admin/plugins/css/bootstrap.min.css')) !!}

    {!! HTML::style( asset('assets/admin/plugins/css/login.css')) !!}



    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="login">

<div class="menu-toggler sidebar-toggler">
</div>


<div class="content">

    {!! Form::open(['action' => ['AdminController@postLogin'],'class' => 'login-form' ]) !!}
        <h3 class="form-title">Sign In</h3>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            {!! Form::text('email',null, ['placeholder' => 'Email', 'class' => 'form-control form-control-solid placeholder-no-fix']) !!}
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control form-control-solid placeholder-no-fix']) !!}
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Login</button>
        </div>
    {!!Form::close()!!}
</div>
<div class="copyright">
    2017 © Elements Of Nature. Admin Dashboard.
</div>


{!! HTML::script( asset('assets/admin/plugins/js/jquery.min.js') ) !!}


</body>
<!-- END BODY -->
</html>