@section('content')
{{ 
	Form::model(
		[
			'url' => action('RemindersController@postRemind'),
			'method' => 'POST',
			'class' => 'form_class'
		]
	) }}

	<h2 class="form-signin-heading">{{ trans('accounts.forget.header') }}</h2>

	<div class="form-group">
		{{ Form::label('email', trans('accounts.email'), ['class' => 'form-label']) }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
	</div>

	{{ Form::submit(trans('accounts.forget.submit'), ['class' => 'btn btn-default']) }} 

{{ Form::close() }}
@stop