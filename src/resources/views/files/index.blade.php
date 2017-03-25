@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
	<body>
	@foreach($files as $file)
		<tr>
			<td>
				<a href="{{ Route::has('localization.files.show') ? route('localization.files.show', ['language' => $file['language'], 'file' => $file['file']]) : '#' }}">
					{{ ucfirst($file['file']) }}
				</a>
			</td>
			<td>
				<a href="{{ Route::has('localization.files.show') ? route('localization.files.edit', ['language' => $file['language'], 'file' => $file['file']]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					Edit
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