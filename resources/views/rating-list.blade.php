@extends('layouts.master')

@section('title', 'Avaliações de Atendimento')

@section('content')
	<div class="container">
		<h1>Avaliações de Atendimento</h1>
		<br>
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Número</th>
					<th>Solicitação</th>
					<th>Nota</th>
					<th>Descrição</th>
					<th>Data / Hora</th>
				<tr>
			</thead>
			<tbody>
				@foreach ($ratings as $rat)
					<tr>
						<td>{{ $rat->id }}</td>
						<td>
							<a href="/list/{{ $rat->requisition_id }}">
								{{ $rat->requisition_id }}
							</a>
						</td>
						<td>{{ $req->rate }}</td>
						<td>{{ $req->description }}</td>
						<td>{{ $req->created_at }}
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $ratings->links() }}
	</div>
@stop
