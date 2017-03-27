@extends('layouts.app')

@section('content')
<div class="form-group">
	<a href="{{ Route::has('localization.index') ? route('localization.index') : '#' }}" class="btn btn-lg btn-block btn-primary">
		<i class="fa fa-home" aria-hidden="true"></i>
	</a>
</div>

<table class="table table-striped table-hover">
	<body>
	@foreach($languages as $language)
		<tr>
			<td>
				<span class="flag-icon flag-icon-{{ $language=='en' ? 'us' : $language }}"></span>
			</td>
			<td>
				{{ $language }}
			</td>
			<td>
				@if($language == App::getLocale())
					<span class="label label-success">
						Default
					</span>
				@endif
			</td>
			<td>
				<a href="{{ Route::has('localization.languages.copy') ? route('localization.languages.copy', ['language' => $language]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					<i class="fa fa-clone" aria-hidden="true"></i>
				</a>

				<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', ['language' => $language]) : '#' }}" class="btn btn-lg btn-primary pull-right">
					<i class="fa fa-folder-open-o" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</body>
</table>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

<link href="{{ asset('/vendor/yk/laravel-localization/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<style type="text/css">
	.table :last-child > a {
		margin-left: 8px;
	}
</style>
@append
