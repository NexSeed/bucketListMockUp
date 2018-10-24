@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($users as $user)
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 col-xs-offset-1">
					<a href="/show/{{$user->id}}">
						@if($user->profile_picture_path)
							<div style="height: 150px; text-align: center; word-wrap: break-word;"><img src="{{ asset('images/profile_picture_data') . '/' . $user->id .'_' . $user->profile_picture_path }}" style="width: 100px; height: 100px; border-radius: 50%;"><p>{{$user->name}}</p></div>
						@else
							<div style="height: 150px; text-align: center; word-wrap: break-word;"><img src="{{ asset('images/profile_picture_data/seedkun.png') }}" style="width: 100px; height: 100px; border-radius: 50%;"><p>{{$user->name}}</p></div>
						@endif
					</a>
				</div> <!-- /.col-xx-2 -->
			@endforeach
		</div> <!-- /.row -->
		<div align="center">
			{!! $users->render() !!}
		</div>
	</div> <!-- /.container -->
@endsection
