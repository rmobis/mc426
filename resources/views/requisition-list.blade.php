@extends('layouts.master')

@section('title', 'Minhas Solicitações')

@section('content')
	<div class="container">
		<div class="header--filter">
			<h1>Minhas Solicitações</h1>
			<form class="form-inline" action="/list" method="POST" role="search">
				{{ csrf_field() }}
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-search"></i></div>
					</div>
					<input type="search" class="form-control" name="search" placeholder="Pesquisar" value="{{ isset($text) ? $text : '' }}">
				</div>
			</form>
		</div>
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
