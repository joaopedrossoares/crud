@extends('templates.template')

@section('header')
<div class="col-md-12">
	<h1>Cliente <small>editar</small></h1>
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
<form action="{{ route('client.update', $client->id) }}" method="POST">
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label" for="client_name">Nome</label>

			<input type="text" name="name" class="form-control" id="client_name" value="{{ $client->name }}" placeholder="Nome">
		</div>
		<div class="form-group">
			<label class="control-label" for="cnpj_client">CNPJ</label>

			<input type="text" name="cnpj" class="form-control" id="cnpj_client" value="{{ $client->cnpj }}"placeholder="CNPJ">
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="PUT">
	</div>


	<div class="col-md-12">

		<a href="{{ route('client.index') }}" alt="Voltar" title="Voltar" class="btn btn-primary btn-icon">
			<i class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></i>
			Voltar
		</a>

		<button type="submit" class="btn btn-primary btn-icon btn-plus">
			<i class="glyphicon glyphicon-plus"  aria-hidden="true"></i>
			editar
		</button>
	</div>
</form>
@stop

@section('javascript')
<script src="http://oss.maxcdn.com/jquery.mask/1.11.4/jquery.mask.min.js"></script>
<script type="text/javascript">
	$('#cnpj_client').mask("99.999.999/9999-99");
</script>
@stop