@extends('layouts.master')

@section('title', 'Minhas Solicitações')

@section('content')
	<div class="container">
		<div class="header--filter">
			<h1>Minhas Solicitações</h1>
			<form class="form-inline" action="/list" method="POST">
				<div class="form-group">
					<select name="status" class="form-control">
						<option value="">Status</option>
						<option
							value="open"
							@if ($status == 'open')
								selected="selected"
							@endif
						>Open</option>
						<option
							value="closed"
							@if ($status == 'closed')
								selected="selected"
							@endif
						>Closed</option>
						<option
							value="deleted"
							@if ($status == 'deleted')
								selected="selected"
							@endif
						>Deleted</option>
					</select>
				</div>
				<div class="form-group">
					<select name="category" class="form-control">
						<option value="">Categoria</option>
						@foreach($categories as $cat)
							<option
								value="{{ $cat->id }}"
								@if ($cat->id == $category)
									selected="selected"
								@endif
								>{{ $cat->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fa fa-search"></i></div>
					</div>
					<input type="text" class="form-control" name="search" placeholder="Pesquisar" value="{{ isset($text) ? $text : '' }}">
				</div>
				<div class="form-group">
					{{ csrf_field() }}
					<button class="btn btn-primary">Buscar</button>
				</div>
			</form>
		</div>
		<br>
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Número</th>
					<th>Status</th>
					<th>Assunto</th>
					<th>Categoria</th>
					<th>Descrição</th>
					<th>Data / Hora</th>
				<tr>
			</thead>
			<tbody>
				@foreach ($requisitions as $req)
					<tr>
						<td>
							<a href="/list/{{ $req-> id}}">
								{{ $req->id }}
							</a>
						</td>
						<td>
							<span style="text-transform: capitalize;" class="badge {{$req->status === 'open' ? 'badge-success' : ($req->status === 'closed' ? 'badge-danger' : ($req->status === 'deleted' ? 'badge-secondary' : ''))}}">{{ $req->status ?? '-' }}</span>
						</td>
						<td>{{ $req->topic }}</td>
						<td>{{ isset($req->category) ? $req->category->name : '-' }}</td>
						<td>{{ str_limit($req->description, $limit = 40, $end = '...') }}</td>
						<td>{{ $req->created_at }}
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $requisitions->links() }}
	</div>
@stop
