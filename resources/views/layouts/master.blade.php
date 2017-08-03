<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{ url('favicon.icon') }}" type="image/x-icon">
	<link rel="icon" href="{{ url('favicon.icon') }}" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.0/css/iziModal.min.css">
	<link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-collapse-sidebar.css') }}">
</head>
<body>
	<div id="wrapper">
		@include('../includes/side_nav')

		<div id="forkCont">
			@include('../includes/fork')
		</div>

		<main class="container">
			@yield('main_section')
		</main>
	</div>
	@include('../includes/footer')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.0/js/iziModal.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ URL::asset('js/scripts.js') }}"></script>

</body>
</html>