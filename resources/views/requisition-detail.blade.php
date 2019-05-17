@extends('layouts.master')

@section('title', 'Detalhe de Solicitação')

@section('content')
	<div class="row">
		<div class="col">
			<h1>Solicitação #{{$requisition->id}}</h1>
		</div>
		<div class="col text-right">
			@if (!is_null($requisition->status) && $requisition->status !== 'deleted')
				<form action="/list/{{$requisition->id}}" method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-danger float-right">Remover</button>
				</form>

				<a class="btn btn-dac float-right" style="margin-right: 10px;" href="/list/{{$requisition->id}}/edit" role="button">Editar</a>
			@endif

			@if (!is_null($requisition->status) && $requisition->status === 'open')
				<form action="/list/{{$requisition->id}}/close" method="POST">
					@csrf
					<button type="submit" class="btn btn-secondary float-right" style="margin-right: 10px;">Fechar Solicitação</button>
				</form>
			@endif
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Assunto:</b>
					</h5>
					{{$requisition->topic}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Categoria:</b>
					</h5>
					{{$requisition->category->name}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Descrição:</b>
					</h5>
					{{$requisition->description}}
				</li>

			</ul>
		</div>
		<div class="col">
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Data de Criação:</b>
					</h5>
					{{$requisition->created_at}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Data de Atualização:</b>
					</h5>
					{{$requisition->updated_at}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Status:</b>
					</h5>
					{{$requisition->status ?? "-"}}
				</li>
			</ul>
		</div>
	</div>
@stop
