@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<h2>Login</h2>

		<form method="POST" action="/login">
			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="email">Email:</label>
				<input name="email" type="text" class="form-control form-control-danger" id="email" placeholder="email">
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="password">Password:</label>
				<input name="password" type="password" class="form-control form-control-danger" id="password" placeholder="password">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>

			@include('layouts.errors')
			
			{{ csrf_field() }}
		</form>

	</div>
@stop