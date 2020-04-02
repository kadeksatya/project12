@extends('layouts.app')

@section('content')

@error('username')
<div class="alert-error"></div>       
@enderror


<div class="login-box">
    <div class="login-logo">
<b>Admin</b>Login
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form action="{{route('login')}}" method="post" id="form-login">
            @csrf
          <div class="input-group mb-3">
            <input id="username" name="username" type="text" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
            <button type="reset" class="btn btn-danger ">Reset </button>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

<script>
    $(document).ready(function(){



      $(".alert-error").show(function(){
        toastr.error("Username Atau Password Salah!")
      })


      $(function(){
        $("#username").on('keypress', function(e){
            if(e.which==32)
            {
                toastr.error("Username jangan makek space ngentot ")
                return false
            }
        });
    });

    });
  </script>
@endsection
