@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.files.edit') ? route('localization.files.edit', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-warning btn-block">
		Edit
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
		</tr>
	@endforeach
</table>
@append
