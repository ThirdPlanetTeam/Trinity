@section('content')
{{ 
	Form::model(
		[
			'url' => action('RemindersController@postReset'),
			'method' => 'POST'
		], ['class' => 'form_class']
	) }}

	<h2 class="form-signin-heading">{{ trans('accounts.forget.reset.header') }}</h2>

	
	  {{ Form::hidden('token', $token) }} 

	<div class="form-group">
		{{ Form::label('email', trans('accounts.email'), ['class' => 'form-label']) }}
		{{ Form::text('email', null, ['class' => 'form-control']) }}
		@if ($errors->has('email'))
			<span class="help-block">{{ $errors->first('email')}}</span>
		@endif
	</div>	

	<div class="form-group">
		{{ Form::label('password', trans('accounts.password'), ['class' => 'form-label']) }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		{{ Form::hidden('jscrypt_password', null, ['class' => 'jscrypt', 'data-salt' => 'sha1', 'data-source' => 'password']) }}
		@if ($errors->has('password'))
			<span class="help-block">{{ $errors->first('password')}}</span>
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('password_confirmation', trans('accounts.password_again'), ['class' => 'form-label']) }}
		{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
		{{ Form::hidden('jscrypt_password_confirmation', null, ['class' => 'jscrypt', 'data-salt' => 'sha1', 'data-source' => 'password_confirmation']) }}
		@if ($errors->has('password_confirmation'))
			<span class="help-block">{{ $errors->first('password_confirmation')}}</span>
		@endif
	</div>	

	{{ Form::submit(trans('accounts.forget.reset.submit'), ['class' => 'btn btn-default']) }} 

{{ Form::close() }}
@stop