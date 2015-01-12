@section('title')
Accueil
@stop

@section('content')
	<h1>{{ trans('home.presentation.title') }}</h1>
	@foreach (trans('home.presentation.text') as $text)
		<p>{{ $text }}</p>
	@endforeach

@stop