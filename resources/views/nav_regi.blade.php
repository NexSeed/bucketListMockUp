<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="/regi/{{ Auth::user()->id }}">BUCKET LIST</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- 左寄せメニュー -->
			<ul class="nav navbar-nav">
			</ul>
			<!-- 右寄せメニュー -->
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/regi/{{ Auth::user()->id }}">
					@if(Auth::user()->profile_picture_path)
						<img src="{{ asset('images/profile_picture_data') . '/' . Auth::user()->id . '_' . Auth::user()->profile_picture_path }}" class="img-circle" style="width: 18px; height: 18px;">
					@else
						<img src="{{ asset('images/profile_picture_data/seedkun.png') }}" class="img-circle" style="width: 18px; height: 18px;">
					@endif
					{{ Auth::user()->name }}
				</a></li>
			</ul>
		</div> <!-- /.navbar-collapse -->
	</div> <!-- /.container-fluid -->
</nav>
