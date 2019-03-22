<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/app.css">

		<title>Formulário de Atendimento ao usuário - Minhas Solicitações</title>
	</head>
	<body>
		<header>
			<div class="banner">
				<div class="logo-dac">
					<img src="images/logo_dac.svg" alt="" />
				</div>
				<div>
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
							<a class="active" href="">
								Minhas Solicitações
							</a>
						</li>
						<li>
							<a href="/">
								Nova Solicitação
							</a>
						</li>
						<li>
							<a href="#">
								Sair
							</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<h1>Minhas Solicitações</h1>
				<br>
				<table class="table table-bordered">
					<thead class="thead-light">
						<tr>
							<th>Número</th>
							<th>Assunto</th>
							<th>Categoria</th>
							<th>Descrição</th>
						<tr>
					</thead>
					<tbody>
						@foreach ($requisitions as $req)
							<tr>
								<td>{{ $req->id }}</td>
								<td>{{ $req->topic }}</td>
								<td>{{ $req->category }}</td>
								<td>{{ str_limit($req->description, $limit = 40, $end = '...') }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</main>
	</body>
</html>
