<p><a href="{{ URL::route('admin.teams.index') }}">Revenir</a></p>

<h1>{{ $team->name }}</h1>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Description</h3>
  </div>
  <div class="panel-body">
    {{ $team->description }}
  </div>
</div>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Configuration</h3>
  </div>
  <div class="panel-body">
    {{ $team->configuration }}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Nombre de comptes</h3>
  </div>
  <div class="panel-body">
    {{ $team->account()->count() }}
  </div>
</div>


<p><a href="{{ URL::route('admin.teams.edit', $team->id) }}">Editer l'équipe</a></p>
