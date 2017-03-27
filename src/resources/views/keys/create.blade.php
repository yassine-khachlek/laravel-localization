@extends('layouts.app')

@section('content')
<form action="{{ Route::has('localization.keys.store') ? route('localization.keys.store', ['language' => $language, 'file' => $file]) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
      	<input name="key" type="text" value="{{ old('key') }}" class="form-control" placeholder="Key">
      	
        @if ($errors->has('key'))
            <span class="help-block">
                <strong>{{ $errors->first('key') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
      	<input name="value" type="text" value="{{ old('value') }}" class="form-control" placeholder="Value">
      	
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

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<a href="{{ Route::has('localization.keys.index') ? route('localization.keys.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-block btn-default">
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
