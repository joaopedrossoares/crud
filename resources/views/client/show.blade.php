@extends('templates.template')

@section('header')
<div class="col-md-8">
	<h1>Cliente <small>Mostrar</small></h1>
</div>

@stop
@section('content')

<div class="col-md-12">
	<div class="form-group">
		<label class="control-label" for="client_name">Data do Cadastro</label>

		<span type="text" class="form-control" id="client_name">
			{{ $client->created_at }}
		</span>

	</div>	
	<div class="form-group">
		<label class="control-label" for="client_name">Nome</label>

		<span type="text" class="form-control" id="client_name">
			{{ $client->name }}
		</span>

	</div>
	<div class="form-group">
		<label class="control-label" for="cnpj_client">CNPJ</label>

		<span type="text" class="form-control" id="cnpj_client">
			{{ $client->cnpj }}
		</span>
	</div>
</div>
<div class="divider"></div>
<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>

					<th>Rua</th>
					<th>Nº</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>Pais</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($client->address as $address)
				<tr>
					<td>{{ $address->street }}</td>
					<td>{{ $address->number }}</td>
					<td>{{ $address->district }}</td>
					<td>{{ $address->city }}</td>
					<td>{{ $address->state }}</td>
					<td>{{ $address->country }}</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="col-md-12">
	<form action="{{ route('client.destroy', $client->id) }}" method="POST">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">
		<div class="col-md-12">

			<a href="{{ route('client.index') }}" alt="Voltar" title="Voltar" class="btn btn-primary btn-icon">
				<i class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></i>
				Voltar
			</a>

			<button type="submit" class="btn btn-danger btn-icon btn-plus">
				<i class="glyphicon glyphicon-remove"  aria-hidden="true"></i>
				Deletar Cliente
			</button>
		</div>
	</form>
</div>
@stop