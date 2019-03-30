<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/app.css">

		<title>Formulário de Atendimento ao usuário - Nova Solicitação</title>
	</head>
	<body>
		<header>
			<div class="banner">
				<div class="logo-dac">
					<img src="images/logo_dac.svg" alt="" />
				</div>
				<div class="banner__title">
					<h2>Sistemas Acadêmicos - Formulário de Atendimento ao usuário</h2>
				</div>
				<div class="logo-unicamp">
					<img src="images/logo_unicamp.svg" alt="" height="50" />
				</div>
			</div>
			<div class="navigation">
				<div class="container">
					<ul class="menu">
						<li>
							<a href="/list">
								Minhas Solicitações
							</a>
						</li>
						<li>
							<a class="active" href="">
								Nova Solicitação
							</a>
						</li>
						<!-- <li>
							<a href="#">
								Sair
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<h1>Nova Solicitação</h1>
				<h6>(*) Campos Obrigatórios</h6>
				<br>
				<form action="/" method="POST">
					@csrf

					<div class="form-group">
						<label for="topic">Assunto *</label>
						<input class="form-control" type="text" name="topic" required>
					</div>
					<div class="form-group">
						<label for="category">Categoria *</label>
						<select class="form-control" name="category" required>
							{{-- Placholder --}}
							<option value="" selected disabled hidden>-- Selecione a Categoria --</option>

							@foreach($categories as $cat)
								<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="description">Descrição *</label>
						<textarea class="form-control" name="description" rows="3" required></textarea>
					</div>

					<button class="btn btn-dac" type="submit">Enviar</button>
				</form>
			</div>
		</main>
	</body>
</html>
