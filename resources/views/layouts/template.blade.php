<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CDENTAL</title>

		@include('layouts.head')

        <!-- PNotify -->
        {!! Html::style('vendors/pnotify/dist/pnotify.css') !!}

        {{--{!! Html::style('css/icheck/flat/green.css') !!}--}}
        {{--{!! Html::style('css/floatexamples.css') !!}--}}

        <!-- Select2 -->
        {!! Html::style('vendors/select2/dist/css/select2.css') !!}


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <style>
            body, .left_col, .nav_title{
                background: #635194;
            }
            .nav.side-menu>li.active>a {
                background: linear-gradient(#403356, #3d2c57),#3a2a54;
            }
            .nav-md ul.nav.child_menu li:before {
                background: #403356;
            }
            .daterangepicker {
                z-index: 10000 !important;
            }

            .select2-container {
                z-index: 9999999;
            }
            .loading {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                display: none;
                background: #fff url("{{asset('images/ajax-loader.gif')}}") no-repeat center center;
                opacity: .75;
                filter: alpha(opacity=75);
                z-index: 999999999;
            }
        </style>

		@yield('style_content')
	</head>
	<body class="nav-md">

		<script>
			NProgress.start();
		</script>

		<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
		@yield('modal_content')

		@include('layouts.modals.remove')
		@include('layouts.modals.add')

		<div class="container body">
			<div class="main_container">
				<!---- Visualização de erros ----->
			@if (count($errors) > 0)
				@include('layouts.alerts.erros')
			@endif
			@if (session()->has('mensagem'))
				@include('layouts.alerts.success')
			@endif
			@include('layouts.menu')
			<!-- page content -->
				<div class="right_col" role="main">
				@yield('page_content')
				<!-- /page content -->
				</div>
			</div>
		</div>
		@include('layouts.foot')

        {!! Html::script('vendors/iCheck/icheck.min.js') !!}

		@yield('scripts_content')

        <script>
            NProgress.done();
        </script>
	</body>
</html>
