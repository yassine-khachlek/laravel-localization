@extends('layouts.app')

@section('content')
<form action="{{ Route::has('localization.languages.store') ? route('localization.languages.store', ['language' => $language]) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group">
      	<input type="text" value="{{ $language }}" class="form-control" disabled>
	</div>

	<div class="form-group{{ $errors->has('language_iso_code') ? ' has-error' : '' }}">
      	<input name="language_iso_code" type="text" value="{{ old('language_iso_code') }}" class="form-control" placeholder="Language Iso Code">
      	
        @if ($errors->has('language_iso_code'))
            <span class="help-block">
                <strong>{{ $errors->first('language_iso_code') }}</strong>
            </span>
        @endif
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index') : '#' }}" class="btn btn-lg btn-block btn-default">
					CANCEL
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<button type="submit" class="btn btn-danger btn-block btn-lg">
					SAVE
				</button>
			</div>
		</div>
	</div>
</form>
@append
