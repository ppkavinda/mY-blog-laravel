@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<h1>Create post</h1>
		<hr>

		<form method="POST" action="/posts">
			<div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="exampleInputEmail1">Title</label>
				<input name="title" type="text" class="form-control form-control-danger" id="exampleInputEmail1" placeholder="title">
			</div>
			<div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
				<label class="form-control-label" for="body">Body</label>
				<textarea name="body" rows="5" class="form-control form-control-danger" id="body" placeholder="Your post content goes here..."></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

			@include('layouts.errors')
			
			{{ csrf_field() }}
		</form>
	</div>
@stop