@extends('layout')

@section('content')
	<div class="container-fluid" style="padding-top: 60px;">
		<div class="row" style="padding: 20px;">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<form class="form-horizontal" role="form" method="POST" action="/auth/login">
							{{-- CSRF対策--}}
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">E-Mail Address</label>
								<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="bucket list">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">Password</label>
								<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
									<input type="password" class="form-control" name="password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
									<input type="submit" class="btn btn-info" value="Login">&nbsp;|&nbsp;
									<a href="/auth/register">Register</a>
								</div>
							</div>
						</form>
					</div> <!-- .panel-body -->
				</div> <!-- .panel -->
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
@endsection
