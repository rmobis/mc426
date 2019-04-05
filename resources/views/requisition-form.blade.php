@extends('layouts.master')

@section('title', 'Nova Solicitação')

@section('content')
	<h1>Nova Solicitação</h1>
	<h6>(*) Campos Obrigatórios</h6>
	<br>
	<form action="/" method="POST">
		@csrf

		<div class="form-group">
			<label for="topic">Assunto *</label>
			<input class="form-control" type="text" name="topic" required>
		</div>
		<div class="form-group">
			<label for="category">Categoria *</label>
			<select class="form-control" name="category" required>
				{{-- Placholder --}}
				<option value="" selected disabled hidden>-- Selecione a Categoria --</option>

				@foreach($categories as $cat)
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="description">Descrição *</label>
			<textarea class="form-control" name="description" rows="3" required></textarea>
		</div>

		<button class="btn btn-dac" type="submit">Enviar</button>
	</form>
</div>
@stop
