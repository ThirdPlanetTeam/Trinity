{{ 
  Form::model([
      'url' => URL::route('accounts.login'),
      'method' => 'POST'
    ], ['class' => 'form-signin form_class']
  ) }}    
  <h2 class="form-signin-heading">{{ trans('accounts.login.header') }}</h2>

  {{ Form::hidden('url_redirect', isset($url_redirect) ? $url_redirect : '') }} 

  <div class="form-group">
    {{ Form::label('username', trans('accounts.username'), ['class' => 'sr-only']) }}
    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('accounts.username')]) }}
    @if ($errors->has('username'))
      <span class="help-block">{{ $errors->first('username')}}</span>
    @endif
  </div>

  <div class="form-group">
    {{ Form::label('password', trans('accounts.password'), ['class' => 'sr-only']) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('accounts.password')]) }}
    {{ Form::hidden('jscrypt_password', null, ['class' => 'jscrypt', 'data-salt' => 'sha1', 'data-source' => 'password']) }}
    @if ($errors->has('password'))
      <span class="help-block">{{ $errors->first('password')}}</span>
    @endif
  </div>

  <div class="checkbox form-group"> 
    <div class="checkbox">
      <label>
        {{ Form::checkbox('remember-me') }} {{ trans('accounts.login.autologin') }}
      </label>
    </div>    
  </div>
  {{ Form::submit(trans('accounts.login.submit'), ['class' => 'btn btn-default']) }} 
  <hr>
  {{ link_to_route('accounts.forget', trans('accounts.forget.link')) }}
  {{ link_to_route('accounts.validation', trans('accounts.validation.link')) }} 
{{ Form::close() }}