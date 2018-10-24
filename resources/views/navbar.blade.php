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
				<li><a href="/image/edit">Profile image</a></li>
				<li><a href="/mypage/{{ Auth::user()->id }}">My Page</a></li>
				<li><a href="/users">User List</a></li>
				<li><a href="/auth/logout">logout</a></li>
			</ul>
		</div> <!-- /.navbar-collapse -->
	</div> <!-- /.container-fluid -->
</nav>
