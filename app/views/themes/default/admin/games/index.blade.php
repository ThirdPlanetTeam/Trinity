@section('title')
Gestion des comptes
@stop

@section('content')
<h1>Tous les comptes</h1>

<a href="{{ URL::route('admin.accounts.create') }}">Ajouter un compte</a>

<table class="table">
	<tr>
		<th>Nom du compte</th>
		<th>Adresse e-mail</th>
		<th></th>
		<th></th>
	</tr>
@foreach ($accounts as $account)
	<tr data-id="{{ $account->id }}">
		<td>{{ $account->username }}</td>
		<td>{{ $account->email }}</td>
		<td><a href="{{ URL::route('admin.accounts.show', $account->id) }}">Voir</a></td>
		<td><a href="{{ URL::route('admin.accounts.destroy', $account->id) }}" data-callback="jsonp.delete_element" data-method="delete" data-token="{{ csrf_token() }}" class="rest-link">Supprimer</a></td>
	</tr>
@endforeach
</table>

{{ $accounts->links() }}
@stop