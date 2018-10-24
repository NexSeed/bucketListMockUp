<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">BUCKET LIST</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- 左寄せメニュー -->
			<ul class="nav navbar-nav">
			</ul>
			<!-- 右寄せメニュー -->
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li><a href="http://hackers.nexseed.net/">Hacker's Story</a></li>
					<li><a href="/auth/register">Register</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-unlock-alt" aria-hidden="true">&nbsp;</i>Login<span class="caret"></span>
						</a>
						<ul id="login-dp" class="dropdown-menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<li>
								<div class="row">
									<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
										<form class="form" role="form" method="POST" action="/auth/login" accept-charset="UTF-8" id="login-nav">
											<div class="form-group">
												<label class="sr-only" for="exampleInputEmail2">mail address</label>
												<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="bucket list@gmail.com">
											</div>
											<div class="form-group">
												<label class="sr-only" for="exampleInputPassword2">password</label>
												<input type="password" class="form-control" name="password" placeholder="・・・・・・">
												<div class="help-block text-right"></div>
											</div>
											<div class="form-group">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="submit" value="login" class="btn btn-info btn-block">
											</div>
										</form>
									</div>
								</div>
							</li>
						</ul>
					</li>
				@else
					{{-- ログインしている時 --}}
					<li><a href="http://hackers.nexseed.net/">Hacker's Story</a></li>
					<li><a href="/mypage/{{ Auth::user()->id }}">
						@if(Auth::user()->profile_picture_path)
							<img src="{{ asset('images/profile_picture_data') . '/' . Auth::user()->id .'_' . Auth::user()->profile_picture_path }}" class="img-circle" style="width: 18px; height: 18px;">
						@else
							<img src="{{ asset('images/profile_picture_data/seedkun.png') }}" class="img-circle" style="width: 18px; height: 18px;">
						@endif
							{{ Auth::user()->name }}
					</a></li>
					<li><a href="/auth/logout">logout</a></li>
				@endif
			</ul>
		</div> <!-- /.navbar-collapse -->
	</div> <!-- /.container-fluid -->
</nav>
