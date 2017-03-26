@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.keys.index') ? route('localization.keys.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<form id="whois-lookup-form" action="{{ Route::has('localization.keys.update') ? route('localization.keys.update', ['language' => $language, 'file' => $file, 'key' => $key]) : '#' }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="form-group">
      	<input type="text" value="{{ $language }}" class="form-control" disabled>
	</div>

	<div class="form-group">
      	<input type="text" value="{{ $file }}" class="form-control" disabled>
	</div>

	<div class="form-group">
      	<input type="text" value="{{ $key }}" class="form-control" disabled>
	</div>

	<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
      	<input name="value" type="text" value="{{ old('value', $value) }}" class="form-control" placeholder="value">
      	
        @if ($errors->has('value'))
            <span class="help-block">
                <strong>{{ $errors->first('value') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-danger btn-block btn-lg">
			SAVE
		</button>
	</div>
</form>
@append
