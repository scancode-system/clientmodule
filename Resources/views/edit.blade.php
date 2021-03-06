@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		<i class="fa fa-edit"></i> Clientes #{{ $client->id }}
	</div>
	<div class="card-body">
		@alert_success()
		@include('client::forms.form')
		@loader(['loader_path' => 'clients.edit'])
	</div>
</div>


@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ route('clients.index') }}">Clientes</a>
</li>
<li class="breadcrumb-item">
	Editar Cliente
</li>
@endsection
