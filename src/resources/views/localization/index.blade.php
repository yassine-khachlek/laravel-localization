@extends('layouts.app')

@section('content')
<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index') : '#' }}" class="btn btn-primary btn-block btn-lg">
	LANGUAGES ({{ count($languages) }})
</a>
@append
