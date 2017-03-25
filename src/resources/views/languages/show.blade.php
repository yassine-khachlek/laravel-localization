@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
	@foreach($files as $file)
		<tr>
			<td>
				<a href="{{ Route::has('localization.files.show') ? route('localization.files.show', ['language' => $file['language'], 'file' => $file['file']]) : '#' }}">
					{{ ucfirst($file['file']) }}
				</a>
			</td>
			<td>
				<a href="{{ Route::has('localization.files.show') ? route('localization.files.edit', ['language' => $file['language'], 'file' => $file['file']]) : '#' }}" class="btn btn-primary pull-right">
					Edit
				</a>
			</td>
		</tr>
	@endforeach
</table>
@append

@section('styles')

@append

@section('scripts')

@append