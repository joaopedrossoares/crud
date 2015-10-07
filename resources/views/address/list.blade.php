
@extends('templates.template')

@section('header')
<div class="col-md-8">
	<h1>Endereços <small>lista</small></h1>
</div>
<div class="col-md-4 " style="
padding: 31px;">
<a href="{{route('client.address.create', $clientId)}}" class="btn btn-primary btn-icon btn-plus">
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
					<th></th>
					<th>Rua</th>
					<th>Nº</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Estado</th>
					<th>Pais</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($addresses as $address)
				<tr>
					<td>{{ $address->street }}</td>
					<td>{{ $address->number }}</td>
					<td>{{ $address->district }}</td>
					<td>{{ $address->city }}</td>
					<td>{{ $address->state }}</td>
					<td>{{ $address->country }}</td>
					<td>
						<form action='{{ route('client.address.destroy', [$clientId, $address->id]) }}' method="post">

							<a href="{{ route('client.address.edit', [$clientId, $address->id]) }}" alt="Editar" title="Editar" class="btn btn-primary btn-icon">
								<i class="glyphicon glyphicon-edit"  aria-hidden="true"></i>
							</a>
							<button alt="Deletar" title="Deletar" type="submit" class="btn btn-primary btn-icon">
								<i class="glyphicon glyphicon-remove"  aria-hidden="true"></i>
							</button>
							<input type="hidden" name="_method" value="DELETE" />
							<input type="hidden" name="_token"  value="{{ csrf_token() }}"/>
						</form>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="col-md-12">
	{!! $addresses->render() !!}
</div>

<div class="col-md-12">
	<a href="{{ route('client.index') }}" alt="Voltar" title="Voltar" class="btn btn-primary btn-icon">
		<i class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></i>
		Voltar
	</a>
</div>


@stop