@extends('layouts.app')

@section('content')
<form id="whois-lookup-form" action="{{ Route::has('localization.files.update') ? route('localization.files.update', ['language' => $language, 'file' => $file]) : '#' }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="form-group">
		<a href="{{ Route::has('localization.keys.create') ? route('localization.keys.create', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-warning btn-block">
			ADD NEW KEY
		</a>
	</div>

	@foreach($translations as $key => $value)
		<div class="form-group">

			<input name="KEY_{{ $loop->index }}" type="hidden" value="{{ $key }}">

		    <div class="input-group">

		      <div class="input-group-addon">
		      	{{ $key }}
		      </div>

		      <input name="VALUE_{{ $loop->index }}" type="text" value="{{ $value }}" class="form-control" placeholder="{{ $key }}">

		    </div>

		</div>
	@endforeach

	<div class="form-group">
		<button type="submit" class="btn btn-danger btn-block btn-lg">
			SAVE
		</button>
	</div>

</form>
@append

@section('styles')

@append
