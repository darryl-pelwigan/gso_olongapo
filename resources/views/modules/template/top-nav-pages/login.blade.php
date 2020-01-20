@extends('template::login.login')

@section('content')
<div class="login-box">
    <a href="#" class="text-aqua logo-text">OLONGAPO</a>
  <div class="login-logo">
    <img src="{{asset('olongapo/img/logo-100.png')}}" class="img-responsive logo-img" />
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

     @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif



    <form action="#" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="olongapo_userelogin" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="olongapo_password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8 form-group">
          <div class="checkbox icheck">
            <label>
              <input  type="checkbox"  > Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@stop