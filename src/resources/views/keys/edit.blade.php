@extends('layouts.app')

@section('content')
<form action="{{ Route::has('localization.keys.update') ? route('localization.keys.update', ['language' => $language, 'file' => $file, 'key' => $key]) : '#' }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
      	<input name="value" type="text" value="{{ old('value', $value) }}" class="form-control" placeholder="Value">
      	
        @if ($errors->has('value'))
            <span class="help-block">
                <strong>{{ $errors->first('value') }}</strong>
            </span>
        @endif
	</div>

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
