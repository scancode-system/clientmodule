@extends('dashboard::layouts.master')

@section('content')
@include('importwidget::index', ['module' => 'Client', 'method' => 'importShippingCompanies', 'clear' => true, 'dropzone' => true])
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Importar Transportadoras
</li>
@endsection
