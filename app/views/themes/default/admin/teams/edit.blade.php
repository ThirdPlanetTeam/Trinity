{{ 
	Form::model(
		$team, [
			'url' => $team->id ? URL::route('admin.teams.update', $team->id) : URL::route('admin.teams.store'),
			'method' => $team->id ? 'PUT' : 'POST',
			'class' => 'form_class'
		]
	) }}
	<div class="form-group">
		{{ Form::label('name', "Nom", ['class' => 'form-label']) }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}
		@if ($errors->has('name'))
			<span class="help-block">{{ $errors->first('name')}}</span>
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('description', "Description", ['class' => 'form-label']) }}
		{{ Form::textarea('description', null, ['class' => 'form-control']) }}
		@if ($errors->has('description'))
			<span class="help-block">{{ $errors->first('description')}}</span>
		@endif
	</div>

	<div class="form-group">
		{{ Form::label('configuration', "Configuration", ['class' => 'form-label']) }}
		{{ Form::textarea('configuration', null, ['class' => 'form-control']) }}
		@if ($errors->has('configuration'))
			<span class="help-block">{{ $errors->first('configuration')}}</span>
		@endif
	</div>		

	{{ Form::submit() }}
{{ Form::close() }}