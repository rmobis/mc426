@extends('layouts.master')

@section('title', 'Minhas Solicitações')

@section('content')
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
						<td>{{ $req->category->name }}</td>
						<td>{{ str_limit($req->description, $limit = 40, $end = '...') }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
