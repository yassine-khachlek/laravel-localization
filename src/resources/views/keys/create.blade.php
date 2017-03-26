@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.keys.index') ? route('localization.keys.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<form id="whois-lookup-form" action="{{ Route::has('localization.keys.store') ? route('localization.keys.store', ['language' => $language, 'file' => $file]) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group">
      	<input type="text" value="{{ $language }}" class="form-control" disabled>
	</div>

	<div class="form-group">
      	<input type="text" value="{{ $file }}" class="form-control" disabled>
	</div>

	<div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
      	<input name="key" type="text" value="{{ old('key') }}" class="form-control" placeholder="key">
      	
        @if ($errors->has('key'))
            <span class="help-block">
                <strong>{{ $errors->first('key') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
      	<input name="value" type="text" value="{{ old('value') }}" class="form-control" placeholder="value">
      	
        @if ($errors->has('value'))
            <span class="help-block">
                <strong>{{ $errors->first('value') }}</strong>
            </span>
        @endif
	</div>

	&nbsp;&nbsp;
	@foreach($languages as $value)
	<div class="checkbox-inline">
		<label>
		  <input type="checkbox" disabled="disabled" checked="checked"> {{ $value }}
		</label>
	</div>
	@endforeach

	<div class="form-group">
		<button type="submit" class="btn btn-danger btn-block btn-lg">
			SAVE
		</button>
	</div>
</form>
@append
