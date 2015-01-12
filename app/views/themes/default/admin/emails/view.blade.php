<p><a href="{{ URL::route('admin.emails.index') }}">Revenir</a></p>

<h1>Paramètres de l'email</h1>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sujet</h3>
  </div>
  <div class="panel-body">
    {{ $email->title }}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Destinataire</h3>
  </div>
  <div class="panel-body">
    {{ $email->to }}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Date</h3>
  </div>
  <div class="panel-body">
    {{ $email->created_at }}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Corps</h3>
  </div>
  <div class="panel-body">
    {{ $email->message }}
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Clé de lecture</h3>
  </div>
  <div class="panel-body">
    {{ $email->hash }}
  </div>
</div>


<p><a href="{{ URL::route('home.email', $email->hash) }}">Visualiser le mail</a></p>
