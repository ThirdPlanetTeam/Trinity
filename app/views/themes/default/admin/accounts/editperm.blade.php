{{ 
  Form::model(
    $perm,
    [
      'url' => action('AclAdminController@postPerm', ['accounts' => $perm->account()->first()->id, 'id' => $perm->id]),
      'method' => 'POST',
      'class' => 'form-inline'
    ]
  ) }}

  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
    <h4 class="modal-title">Permissions</h4>
  </div>

  <div class="modal-body">

  <div class="form-group">
    {{ Form::label('permission', "Permission", ['class' => 'sr-only']) }}
    {{ Form::text('permission', null, ['class' => 'form-control', 'placeholder' => 'Permission']) }}
  </div>

  <div class="form-group">
    {{ Form::label('option', "Option", ['class' => 'sr-only']) }}
    {{ Form::text('option', null, ['class' => 'form-control', 'placeholder' => 'Option']) }}
  </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    <button type="submit" class="btn btn-primary">Sauver</button>
  </div>

{{ Form::close() }}

