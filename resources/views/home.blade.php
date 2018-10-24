@extends('layout')

@section('content')
	<style>
		body {
			/* bucket_list/public/images/ 直下に好きな画像をhome.jpgとして保存してください */
			background-image: url({{ asset('images/home.jpg') }});
			/* 垂直方向中央、水平方向中央に位置指定 */
			background-position: center center;
			/* 画像をタイル状に繰り返し表示しない */
			background-repeat: no-repeat;
			/* コンテンツの高さが画像の高さより大きい時、動かないように固定 */
			background-attachment: fixed;
			/* 表示するコンテナの大きさに基づいて、背景画像を調整 */
			background-size: cover;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px; margin-left: 30px;">
				<h1 style="font-size: 60px;">BUCKET LIST</h1>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 style="color: gray;">Never give up on something that you really want.</h4>
			</div>
		</div>
	</div>
@endsection
