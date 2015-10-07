@extends('templates.template')

@section('header')
<div class="col-md-12">
	<h1>Endereço <small>Editar</small></h1>
</div>
<div class="col-md-12">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>

	@endif
	@if (Session::has('success'))
	<div class="alert alert-success">
		{{ Session::get('success') }}
	</div>
	@endif
</div>
@stop
@section('content')
<form action="{{ route('client.address.update', [$clientId, $address->id]) }}" method="POST">
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label" for="street">Rua</label>

			<input type="text" name="street" value="{{ $address->street }}" class="form-control" id="street" placeholder="Rua">
		</div><div class="form-group">
		<label class="control-label" for="number">Numero</label>

		<input type="text" name="number" value="{{ $address->number }}" class="form-control" id="number" placeholder="Numero">
	</div><div class="form-group">
	<label class="control-label" for="district">Bairro</label>

	<input type="text" name="district" value="{{ $address->district }}"class="form-control" id="district" placeholder="Bairro">
</div><div class="form-group">
<label class="control-label" for="city">Cidade</label>

<input type="text" name="city" value="{{ $address->city }}" class="form-control" id="city" placeholder="Cidade">
</div><div class="form-group">
<label class="control-label" for="state">Estado</label>

<input type="text" name="state" value="{{ $address->state }}"class="form-control" id="state" placeholder="Estado">
</div>
<div class="form-group">
	<label class="control-label" for="country">Pais</label>

	<input type="text" name="country" value="{{ $address->country }}" class="form-control"  id="country" placeholder="Pais">
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">
</div>


<div class="col-md-12">


	<a href="{{ route('client.address.index', $clientId) }}" alt="Voltar" title="Voltar" class="btn btn-primary btn-icon">
		<i class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></i>
		Voltar
	</a>
	<button type="submit" class="btn btn-primary btn-icon btn-plus">
		<i class="glyphicon glyphicon-plus"  aria-hidden="true"></i>
		Editar
	</button>
</div>
</form>
@stop
