@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	@header_search_add(['search' => $search, 'route_search' => 'clients.index', 'route_add' => 'clients.create'])
	<div class="card-body">
		@alert_success()
		<table class="table table-responsive-sm bg-white table-hover border">
			@include('client::tables.thead')
			<tbody>
				@each('client::tables.tr', $clients, 'client')
			</tbody>
		</table>
		{{ $clients->links() }}
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Clientes
</li>
@endsection
