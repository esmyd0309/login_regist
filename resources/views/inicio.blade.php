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
 
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('plugins/login/images/bg-01.jpg') }}')">
           <div class="col-2">
           </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('login.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Test del Login</h5>
                    <p class="card-text">Este modulo fue desarrollado con las Siguientes Tecnologias, PHP, VUE, BOOTSTRAP, JAVASCRIP, HTML5... </p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Ir alla</a>
                    </div>
                </div>
           </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('registro.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Test del Registro</h5>
                    <p class="card-text">Este modulo de registro de personas, fue desarollado con las siguentes tecnologias  PHP, Datatables, BOOTSTRAP, JAVASCRIP, HTML5...</p>
                    <a href="{{ route('persona.index') }}" class="btn btn-primary">Ir alla</a>
                </div>
            </div>
            <div class="col-2">
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