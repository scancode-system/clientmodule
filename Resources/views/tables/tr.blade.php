<tr>
	<td class="align-middle">{{ $client->corporate_name }}</td>
	<td class="align-middle">{{ $client->cpf_cnpj }}</td>
	<td class="align-middle">{{ $client->buyer }}</td>
	<td class="align-middle">{{ $client->email }}</td>
	<td class="align-middle">{{ $client->phone }}</td>
	<td class="align-middle">{{ $client->client_address->st }}</td>

	<td class="text-right align-middle">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#clients_view_{{ $client->id }}"><i class="fa fa-eye"></i></button>
			<a href="{{ route('clients.edit', $client) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#clients_destroy_{{ $client->id }}"><i class="fa fa-trash-o"></i></button>
		</div>
	</td>
	@include('client::modals.modal_view_clients')
	@modal_destroy(['route_destroy' => 'clients.destroy', 'model' => $client, 'modal_id' => 'clients_destroy_'.$client->id])
</tr>