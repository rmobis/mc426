<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>
	</head>
	<body>
		<form action="/" method="POST">
			@csrf

			<p>
				<label for="topic">Assunto</label>
				<input type="text" name="topic" required>
			</p>
			<p>
				<label for="category">Categoria</label>
				<select name="category" required>
					{{-- Placholder --}}
					<option value="" selected disabled hidden>-- Selecione a Categoria --</option>

					<option value="rooms-and-schedule">Salas & Horários</option>
					<option value="category-2">Categoria 2</option>
					<option value="category-3">Categoria 3</option>
					<option value="category-4">Categoria 4</option>
					<option value="category-5">Categoria 5</option>
					<option value="category-6">Categoria 6</option>
					<option value="category-7">Categoria 7</option>
				</select>
			</p>
			<p>
				<label for="description">Descrição</label>
				<textarea name="description" required></textarea>
			</p>

			<input type="submit">
		</form>
	</body>
</html>
