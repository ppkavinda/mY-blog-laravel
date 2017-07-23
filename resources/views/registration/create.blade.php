@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<h2>Registraiton</h2>

		<form method="POST" action="/register">
			<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="name">Name:</label>
				<input name="name" type="text" class="form-control form-control-danger" id="name" placeholder="name">
			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="email">Email:</label>
				<input name="email" type="text" class="form-control form-control-danger" id="email" placeholder="email">
			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="password">Password:</label>
				<input name="password" type="password" class="form-control form-control-danger" id="password" placeholder="password">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

			@include('layouts.errors')
			
			{{ csrf_field() }}
		</form>

	</div>
@stop