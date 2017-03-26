@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', compact('language')) : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<form id="whois-lookup-form" action="{{ Route::has('localization.files.store') ? route('localization.files.store', compact('language')) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group">
      	<input type="text" value="{{ $language }}" class="form-control" disabled>
	</div>

	<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
      	<input name="file" type="text" value="{{ old('file') }}" class="form-control" placeholder="File">
      	
        @if ($errors->has('file'))
            <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
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

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
@append
