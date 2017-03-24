@extends('layouts.app')

@section('content')
<ul class="nav nav-pills nav-stacked">
	@foreach($languages as $language)
		<li role="presentation" class="">
			<a href="{{ Route::has('localization.languages.show') ? route('localization.languages.show', $language) : '#' }}">
				<span class="flag-icon flag-icon-{{ $language=='en' ? 'us' : $language }}"></span>
				{{ ucfirst($language) }}
			</a>
		</li>
	@endforeach
</ul>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
@append
