{{ 
  Form::model([
      'url' => URL::route('accounts.validation'),
      'method' => 'POST'
    ]) }}    
  <h2 class="form-heading">{{ trans('accounts.validation.header') }}</h2>

  <div class="form-group">
    {{ Form::label('username', trans('accounts.username'), ['class' => 'form-label']) }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('code', trans('accounts.validation.code'), ['class' => 'form-label']) }}
    {{ Form::text('code', null, ['class' => 'form-control']) }}
  </div>

  {{ Form::submit(trans('accounts.validation.submit'), ['class' => 'btn btn-default']) }} 
  <hr>
{{ Form::close() }}