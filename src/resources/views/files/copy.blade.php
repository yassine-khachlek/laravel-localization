@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', compact('language', 'file')) : '#' }}" class="btn btn-lg btn-block btn-primary">
		BACK
	</a>
</div>

<form id="whois-lookup-form" action="{{ Route::has('localization.files.clone') ? route('localization.files.clone', compact('language', 'file')) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group">
      	<input type="text" value="{{ $language }}" class="form-control" disabled>
	</div>

	<div class="form-group">
      	<input type="text" value="{{ $file }}" class="form-control" disabled>
	</div>

	<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
      	<input name="file" type="text" value="{{ old('file') }}" class="form-control" placeholder="file">
      	
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

