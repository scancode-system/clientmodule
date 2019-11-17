@alert_errors()

@if(isset($client))
{{ Form::model($client, ['route' => ['clients.update', $client], 'method' => 'put']) }}
{{ Form::hidden('id', $client->id) }}
@else
{{ Form::open(['route' => 'clients.store']) }}
@endif

<div class="row">
	<div class="col-md-6">
		<h5>Dados</h5>
		<hr>
		<div class="form-group">
			{{ Form::label('corporate_name', 'Razão Social') }}
			{{ Form::text('corporate_name', old('corporate_name'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('fantasy_name', 'Nome Fantasia') }}
			{{ Form::text('fantasy_name', old('fantasy_name'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('cpf_cnpj', 'CPF/CNPJ') }}
			{{ Form::text('cpf_cnpj', old('cpf_cnpj'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('buyer', 'Comprador') }}
			{{ Form::text('buyer', old('buyer'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', old('email'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('phone', 'Telefone') }}
			{{ Form::text('phone', old('phone'), ['class' => 'form-control']) }}
		</div>
	</div>
	<div class="col-md-6">
		<h5>Endereço</h5>
		<hr>
		<div class="form-group">
			{{ Form::label('client_address[street]', 'Rua/AV') }}
			{{ Form::text('client_address[street]', old('street'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[number]', 'Número') }}
			{{ Form::number('client_address[number]', old('number'), ['class' => 'form-control', 'step' => '0.1']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[apartment]', 'Apartamento') }}
			{{ Form::text('client_address[apartment]', old('apartment'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[neighborhood]', 'Bairro') }}
			{{ Form::text('client_address[neighborhood]', old('neighborhood'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[city]', 'Cidade') }}
			{{ Form::text('client_address[city]', old('city'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[st]', 'Estado') }}
			{{ Form::text('client_address[st]', old('st'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('client_address[postcode]', 'CEP') }}
			{{ Form::text('client_address[postcode]', old('postcode'), ['class' => 'form-control']) }}
		</div>
	</div>
</div>
<div class="form-group  mb-0">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}