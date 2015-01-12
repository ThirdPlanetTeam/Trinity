<p><a href="{{ URL::route('admin.accounts.index') }}">Revenir</a></p>

<h1>{{ $account->username }}</h1>

<p>{{ $account->email }}</p>
<p>Crée le {{ $account->created_at }}</p>

@if ($account->validation != null)
	<div class="alert alert-info">Compte non-validé</div>
@endif

<table class="table table-striped">
  <caption>Permissions</caption>
  <tr>
    <th>Permission</th>
    <th colspan="3">Options</th>
  </tr>
@foreach ($account->acl as $perm)
	<tr data-id="{{ $perm->id }}">
		<td>{{ $perm->permission }}</td>
		<td>{{ ($perm->option) ?: "<i>pas d'option</i>" }}</td>
		<td><a href="{{ URL::route('admin.accounts.perm.edit', ['accounts' => $account->id, 'id' => $perm->id]) }}" class="ajax-modal">Editer</a></td>
		<td><a href="{{ URL::route('admin.accounts.perm.destroy', ['accounts' => $account->id, 'id' => $perm->id]) }}" data-callback="jsonp.delete_element" data-method="delete" data-token="{{ csrf_token() }}" class="rest-link">Supprimer</a></td>
	</tr>
@endforeach
</table>
<p><a href="{{ URL::route('admin.accounts.edit', $account->id) }}">Editer le compte</a></p>
