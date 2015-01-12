{{ 
	Form::model(
		$account, [
			'url' => $account->id ? URL::route('admin.accounts.update', $account->id) : URL::route('admin.accounts.store'),
			'method' => $account->id ? 'PUT' : 'POST',
			'class' => 'form_class'
		]
	) }}
	<div class="form-group">
		{{ Form::label('username', trans('accounts.username'), ['class' => 'form-label']) }}
		{{ Form::text('username', null, ['class' => 'form-control']) }}
		@if ($errors->has('username'))
			<span class="help-block">{{ $errors->first('username')}}</span>
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

	<div class="form-group">
		{{ Form::label('email', trans('accounts.email'), ['class' => 'form-label']) }}
		{{ Form::text('email', null, ['class' => 'form-control']) }}
		@if ($errors->has('email'))
			<span class="help-block">{{ $errors->first('email')}}</span>
		@endif
	</div>	

	<div class="form-group">
		{{ Form::label('email_confirmation', trans('accounts.email_again'), ['class' => 'form-label']) }}
		{{ Form::text('email_confirmation', null, ['class' => 'form-control']) }}
		@if ($errors->has('email_confirmation'))
			<span class="help-block">{{ $errors->first('email_confirmation')}}</span>
		@endif
	</div>		
	

	{{ Form::submit() }}
{{ Form::close() }}