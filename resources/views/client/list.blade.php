
@extends('templates.template')

@section('header')
<div class="col-md-8">
	<h1>Cliente <small>lista</small></h1>
</div>
<div class="col-md-4 " style="
    padding: 31px;">
	<a href="{{route('client.create')}}" class="btn btn-primary btn-icon btn-plus">
		<i class="glyphicon glyphicon-plus"  aria-hidden="true"></i>
		Adicionar
	</a>
</div>
<div class="col-md-12">
	@if (Session::has('success'))
	<div class="alert alert-success">
		{{ Session::get('success') }}
	</div>
	@endif
</div>
@stop
@section('content')


<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>Nome</th>
					<th>CNPJ</th>
					<th>Cadastro</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($clients as $client)
				<tr>
					<td>{{ $client->name }}</td>
					<td>{{ $client->cnpj }}</td>
					<td>{{ $client->created_at }}</td>
					<td>
						<a href="{{ route('client.show', $client->id) }}" alt="Mostrar" title="Mostrar" class="btn btn-primary btn-icon">
							<i class="glyphicon glyphicon-eye-open"  aria-hidden="true"></i>
						</a>
						<a href="{{ route('client.edit', $client->id) }}" alt="Editar" title="Editar" class="btn btn-primary btn-icon">
							<i class="glyphicon glyphicon-edit"  aria-hidden="true"></i>
						</a>	
						<a href="{{ route('client.address.index', $client->id) }}" alt="Endereços" title="Endereços" class="btn btn-primary btn-icon">
							<i class="glyphicon glyphicon-map-marker"  aria-hidden="true"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="col-md-12">
		{!! $clients->render() !!}
</div>


@stop