@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index') : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<div class="form-group">
	<a href="{{ Route::has('localization.files.create') ? route('localization.files.create', compact('language')) : '#' }}" class="btn btn-lg btn-warning btn-block">
		ADD
	</a>
</div>

<table class="table table-striped table-hover">
	<body>
	@foreach($files as $file)
		<tr>
			<td>
				{{ $file }}
			</td>
			<td>
				<a href="{{ Route::has('localization.keys.index') ? route('localization.keys.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					Keys
				</a>
			</td>
		</tr>
	@endforeach
	</body>
</table>
@append

@section('styles')

@append

@section('scripts')

@append