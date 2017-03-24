@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<form id="whois-lookup-form" action="{{ Route::has('localization.files.update') ? route('localization.files.update', ['language' => $language, 'file' => $file]) : '#' }}" method="POST">
			{{ method_field('POST') }}
			{{ csrf_field() }}

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

			<button type="submit" class="btn btn-default btn-block btn-lg">
				SAVE
			</button>

			<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-default btn-block btn-lg">
				BACK
			</a>
		</form>
	</div>
</div>
@append

@section('styles')

@append
