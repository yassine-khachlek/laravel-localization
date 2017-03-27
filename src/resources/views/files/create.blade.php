@extends('layouts.app')

@section('content')
<form action="{{ Route::has('localization.files.store') ? route('localization.files.store', compact('language')) : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

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

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', compact('language')) : '#' }}" class="btn btn-lg btn-block btn-default">
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
