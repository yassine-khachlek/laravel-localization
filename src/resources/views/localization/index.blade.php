@extends('layouts.app')

@section('content')
<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index') : '#' }}" class="btn btn-primary btn-block btn-lg">
	<i class="fa fa-language" aria-hidden="true"></i> ({{ count($languages) }})
</a>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

<link href="{{ asset('/vendor/yk/laravel-localization/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@append
