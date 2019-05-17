@extends('layouts.master')

@section('title', 'Edição de Solicitação')

@section('content')
	<h1>Solicitação #{{$requisition->id}}</h1>
	<br>
	<form action="/list/{{$requisition->id}}/edit" method="POST">
		@csrf

		<div class="form-group">
			<label for="topic">Assunto *</label>
			<input class="form-control" type="text" name="topic" value="{{ isset($requisition->topic) ? $requisition->topic : '' }}" required>
		</div>
		<div class="form-group">
			<label for="category">Categoria *</label>
			<select class="form-control" name="category" required>
				@foreach($categories as $cat)
					<option value="{{ $cat->id }}"
						@if ($cat->id === $requisition->category)
							selected="selected"
						@endif
					>{{ $cat->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="description">Descrição *</label>
			<textarea class="form-control" name="description" rows="3" required>{{ isset($requisition->description) ? $requisition->description : '' }}</textarea>
		</div>

		<button class="btn btn-dac" type="submit">Editar</button>
	</form>
</div>
@stop
