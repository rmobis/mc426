@extends('layouts.master')

@section('title', 'Detalhe de Solicitação')

@section('content')
	<div class="row">
		<div class="col">
			<h1>Solicitação #{{$requisition->id}}</h1>
		</div>
		<div class="col text-right">
			@if (!is_null($requisition->status) && $requisition->status === 'closed')
				<form action="/list/{{$requisition->id}}/open" method="POST">
					@csrf
					<button type="submit" class="btn btn-success float-right">Reabrir</button>
				</form>
			@endif
			@if (!is_null($requisition->status) && $requisition->status === 'open')
				<a class="btn btn-dac float-right" style="margin-right: 10px;" href="/list/{{$requisition->id}}/edit" role="button">Editar</a>
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
					{{isset($requisition->category) ? $requisition->category->name : '-'}}
				</li>
				<li class="list-group-item">
					<h5 class="mb-1">
						<b>Descrição:</b>
					</h5>
					{{$requisition->description}}
				</li>
				@if (!is_null($requisition->status) && $requisition->status === 'closed')
					<li class="list-group-item">
						<h5 class="mb-1">
							<b>Motivo do fechamento:</b>
						</h5>
						{{$requisition->closing_reason}}
					</li>
				@endif
				@if (isset($requisition->rating))
					<li class="list-group-item">
						<h5 class="mb-1">
							<b>Avaliação de Atendimento:</b>
						</h5>
						Nota: {{$requisition->rating->rate ?? 0}}
						<br>
						{{$requisition->rating->description}}
					</li>
				@endif
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
					<span style="text-transform: capitalize;" class="badge {{$requisition->status === 'open' ? 'badge-success' : ($requisition->status === 'closed' ? 'badge-danger' : ($requisition->status === 'deleted' ? 'badge-secondary' : ''))}}">{{ $requisition->status ?? '-' }}</span>
				</li>
			</ul>
		</div>
	</div>
	@if (!is_null($requisition->status) && $requisition->status === 'closed' && $requisition->user->id === auth()->user()->id && !isset($requisition->rating))
		<br>
		<br>
		<div class="row">
			<div class="col">
				<form action="/ratings" method="POST">
					@csrf
					<h4>Avaliação de Atendimento</h4>
					<div class="form-group">
						<input name="requisition_id" type="hidden" value="{{$requisition->id}}">
						<label for="rate">Nota (de 1 a 5):</label>
						<select name="rate" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<div class="form-group">
						<label for="description">Comentários (Opcional):</label>
						<textarea class="form-control" name="description" cols="30" rows="5" placeholder="Comentários sobre o atendimento"></textarea>
					</div>
					<button type="submit" class="btn btn-success">Submeter Avaliação</button>
				</form>
			</div>
		</div>
	@endif
	@if (!is_null($requisition->status) && $requisition->status === 'open' && auth()->user()->is_admin)
		<br>
		<br>
		<div class="row">
			<div class="col">
				<form action="/list/{{$requisition->id}}/close" method="POST">
					@csrf
					<div class="form-group">
						<h4>Fechamento de Solicitação</h4>
						<textarea class="form-control" name="reason" cols="30" rows="5" placeholder="Motivo do fechamento"></textarea>
					</div>
					<button type="submit" class="btn btn-secondary">Fechar Solicitação</button>
				</form>
			</div>
		</div>
	@endif
@stop
