<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>
	</head>
	<body>


		<table>
            <tr>
                <th>Número</th>
                <th>Assunto</th>
                <th>Categoria</th>
                <th>Descrição</th>
            <tr>
            @foreach ($requisitions as $req)
                <tr>
                    <td>{{ $req->id }}</td>
                    <td>{{ $req->topic }}</td>
                    <td>{{ $req->category }}</td>
                    <td>{{ str_limit($req->description, $limit = 40, $end = '...') }}</td>
                </tr>
            @endforeach
        </table>
	</body>
</html>
