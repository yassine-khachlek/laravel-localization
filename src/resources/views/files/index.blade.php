@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<a href="{{ Route::has('localization.languages.index') ? route('localization.languages.index') : '#' }}" class="btn btn-lg btn-block btn-primary">
				<i class="fa fa-language" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<a href="{{ Route::has('localization.files.create') ? route('localization.files.create', compact('language')) : '#' }}" class="btn btn-lg btn-success btn-block">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>

<table class="table table-striped table-hover">
	<body>
	@foreach($files as $file)
		<tr>
			<td>
				{{ $file }}
			</td>
			<td>
				<a href="{{ Route::has('localization.files.copy') ? route('localization.files.copy', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					<i class="fa fa-clone" aria-hidden="true"></i>
				</a>

				<a href="{{ Route::has('localization.keys.index') ? route('localization.keys.index', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-primary pull-right">
					<i class="fa fa-folder-open-o" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
	@endforeach
	</body>
</table>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-localization/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<style type="text/css">
	.table :last-child > a {
		margin-left: 8px;
	}
</style>
@append
