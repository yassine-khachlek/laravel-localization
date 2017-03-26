@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', ['language' => $language]) : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<div class="form-group">
	<a href="{{ Route::has('localization.keys.create') ? route('localization.keys.create', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-warning btn-block">
		ADD
	</a>
</div>

<table class="table table-striped table-hover">
	@foreach($translations as $key => $value)
		<tr>
			<td>
				{{ $key }}
			</td>
			<td>
				{{ $value }}
			</td>
			<td>
				<a href="{{ Route::has('localization.keys.edit') ? route('localization.keys.edit', ['language' => $language, 'file' => $file, 'key' => $key]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					Edit
				</a>
			</td>
		</tr>
	@endforeach
</table>
@append
