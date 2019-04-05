<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/app.css">

		<title>@yield('title') - Formulário de Atendimento ao usuário</title>
	</head>
	<body>
		<header>
			@include('layouts.header')
		</header>
		<main>
			<div class="container">
				@yield('content')
			</div>
		</main>
	</body>
</html>
