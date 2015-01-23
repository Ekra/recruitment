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
	<div class="pull-right">
		{{ link_to_route('users.create', 'Sign Up') }}
	</div>

	<h1>Sign In/Up </h1>
</div>


{{Form::open(['route' => 'sessions.store']) }}

<div class="form_group">
{{Form::label('email', 'Email:')}}
{{Form::email('email',null, ['class' => 'form-control'])}}
</div>


<div class="form_group">
{{Form::label('password', 'Password:')}}
{{Form::password('password', ['class' => 'form-control'])}}

</div>
</br>


{{Form::submit('sign in', ['class' => 'btn btn-success']) }}


{{Form::close()}}

</body>
</html>