@section('title')
Gestion des équipes
@stop

@section('content')
<h1>Toutes les équipes</h1>

<a href="{{ URL::route('admin.teams.create') }}">Ajouter une équipe</a>

<table class="table">
	<tr>
		<th>Nom de l'équipe</th>
		<th>Nombre de comptes actuels</th>
		<th></th>
		<th></th>
	</tr>
@foreach ($teams as $team)
	<tr data-id="{{ $team->id }}">
		<td>{{ $team->name }}</td>
		<td>{{ $team->account()->count() }}</td>
		<td><a href="{{ URL::route('admin.teams.show', $team->id) }}">Voir</a></td>
		<td><a href="{{ URL::route('admin.teams.destroy', $team->id) }}" data-callback="jsonp.delete_element" data-method="delete" data-token="{{ csrf_token() }}" class="rest-link">Supprimer</a></td>
	</tr>
@endforeach
</table>

{{ $teams->links() }}
@stop