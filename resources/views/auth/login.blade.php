@extends('auth.app')

@section('login')
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="{{ asset('plugins/login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/login/css/main.css') }}">
  <div id="login">
  
    <div class="limiter">
      <div class="container-login100" style="background-image: url('{{ asset('plugins/login/images/bg-01.jpg') }}')">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form flex-sb flex-w">
              {{ csrf_field() }}
              <span class="login100-form-title p-b-53">
                Inciar Sesión
              </span>
              
              <div class="p-t-31 p-b-9">
                <span class="txt1">
                  Usuario
                </span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Username is required">
                {!! $errors->first('usuario', '<span class="error" style="color:red;font-weight: bold;">:message</span>') !!}
                <input class="input100" id="usuario" type="text" value="{{ old('usuario') }}" name="usuario" title="usuario" placeholder="Usuario" required autofocus>
                  <span class="focus-input100"></span>
              </div>

              <div class="p-t-13 p-b-9">
                <span class="txt1">
                  Contraseña
                </span>
      
                <a href="#" class="txt2 bo1 m-l-5">
                  Olvido?
                </a>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Password is required">
                {!! $errors->first('password', '<span style="color:red">:message</span>') !!}
                <input class="input100" id="password" type="password" name="password" title="password" placeholder="Contraseña" required>
                <span class="focus-input100"></span>
              </div>
              
              <div class="container-login100-form-btn m-t-17">
                <div class="level options">
                  <div class="checkbox level-left">
                    <span></span>
                  </div>
                </div>
  
                <button type="submit" class="btn btn-primary login100-form-btn" >Acceder</button>
              <br>

            </form>
              <br/>
            <div id="app">
              <center> <registrar-component /></center>
            </div>
           
        </div>
      </div>
    </div>
    
  </div>


@endsection

@section('script')

<!--===============================================================================================-->
<script src="{{ asset('plugins/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('plugins/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('plugins/login/js/main.js') }}"></script>

@endsection