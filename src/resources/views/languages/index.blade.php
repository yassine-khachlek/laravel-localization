@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.index') ? route('localization.index') : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<table class="table table-striped table-hover">
	<body>
	@foreach($languages as $language)
		<tr>
			<td>
				<span class="flag-icon flag-icon-{{ $language=='en' ? 'us' : $language }}"></span>
			</td>
			<td>
				{{ $language }}
			</td>
			<td>
				@if($language == App::getLocale())
					<span class="label label-success">
						Default
					</span>
				@endif
			</td>
			<td>
				<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', ['language' => $language]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					Files
				</a>

				<a href="{{ Route::has('localization.languages.copy') ? route('localization.languages.copy', ['language' => $language]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					Copy
				</a>
			</td>
		</tr>
	@endforeach
	</body>
</table>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
@append
