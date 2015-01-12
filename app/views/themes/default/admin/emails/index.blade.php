@section('title')
Gestion des emails
@stop

@section('content')
<h1>Tous les emails</h1>

<table class="table">
	<tr>
		<th>Sujet</th>
		<th>Adresse e-mail</th>
		<th></th>
	</tr>
@foreach ($emails as $email)
	<tr>
		<td>{{ $email->title }}</td>
		<td>{{ $email->to }}</td>
		<td><a href="{{ URL::route('admin.emails.show', $email->id) }}">Voir</a></td>
	</tr>
@endforeach
</table>

{{ $emails->links() }}
@stop