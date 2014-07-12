<!doctype html>
<html>
<head>
	<title>Larabook</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	@include('layouts.partials.nav')

	<div class="container">

        @include('flash::message')

		@yield('content')

    </div>

	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>