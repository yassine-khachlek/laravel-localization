@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<a href="{{ Route::has('localization.files.index') ? route('localization.files.index', ['language' => $language]) : '#' }}" class="btn btn-lg btn-block btn-primary">
				<i class="fa fa-list" aria-hidden="true"></i>
			</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<a href="{{ Route::has('localization.keys.create') ? route('localization.keys.create', ['language' => $language, 'file' => $file]) : '#' }}" class="btn btn-lg btn-success btn-block">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>

<table class="table table-striped table-hover">
	@foreach($translations as $key => $value)
		<tr>
			<td>
				{{ $key }}
			</td>
			<td>
				{{ $value }}
			</td>
			<td>
				<a href="{{ Route::has('localization.keys.edit') ? route('localization.keys.edit', ['language' => $language, 'file' => $file, 'key' => $key]) : '#' }}" class="btn btn-lg btn-warning pull-right">
					<i class="fa fa-edit" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
	@endforeach
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