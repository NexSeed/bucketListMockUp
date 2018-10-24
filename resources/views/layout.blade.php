<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bucket List</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/form.css') }}">
	<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
</head>
<body>
	@if(isset($nav_flag) && $nav_flag == Config::get('const.nav_regi'))
		@include('nav_regi')
	@elseif(isset($nav_flag) && $nav_flag == Config::get('const.nav'))
		@include('navbar')
	@else
		@include('nav_home')
	@endif
	@yield('content')
	<script src="{{ asset('js/jquery-3.1.1.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-1.4.1.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/form.js') }}"></script>
</body>
</html>
