@extends('layouts.default')

@section('content')
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>
body
 { padding-bottom:40px; padding-top:40px; }
</style>
</head>
<body class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<div class="page-header">
	

	<h1> My profile </h1>

</div>

		@foreach ($details as $detail)

	<h3><p>Firstname:{{ $detail->firstname }}<h3></p>
	<h3><p>Lastname:{{ $detail->lastname }}</h3></p>
	<h3><p>Nickname:{{ $detail->nickname }}</h3></p>
	<h3><p>PhoneNumber:{{ $detail->phonenumber }}</h3></p>
	<h3><p>Age:{{ $detail->age }}</h3></p>

<a class="btn btn-info" href="{{ URL::to('details/' . $detail->id . '/edit') }}">Edit Profile</a>


{{ Form::open(['url' => 'details/' . $detail->id, 'class' => 'pull-right']) }}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete ', ['class' => 'btn btn-warning']) }}
{{ Form::close() }}	
@endforeach

@if(Auth::check())
<div>
{{Form::open(['action' => 'SessionsController@destroy', 'method' => 'DELETE'])}}


<br>
<div class="form-group">{{Form::submit('Sign Out',['class' => 'btn btn-success'])}}</div>

{{Form::close()}}
</div>
@endif


@stop