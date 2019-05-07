@extends('layouts.master')

@section('title', 'Detalhe de Solicitação')

@section('content')
	<div class="row">
		<div class="col">
			<h1>Solicitação #{{$requisition->id}}</h1>
		</div>
		<div class="col text-right">
			<button class="btn btn-danger">Remover</button>
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
						<b>Data de criação:</b>
					</h5>
					{{$requisition->created_at}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Categoria:</b>
					</h5>
					{{$requisition->category->name}}
				</li>
			</ul>
		</div>
	</div>
@stop
