@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
				@if(Auth::user()->profile_picture_path)
					<div><img src="{{ asset('images/profile_picture_data') . '/' . Auth::user()->id .'_' . Auth::user()->profile_picture_path }}" style="border-radius: 50%; width: 150px; height: 150px;"></div>
				@else
					<img src="{{ asset('images/profile_picture_data/seedkun.png') }}" style="border-radius: 50%; width: 150px; height: 150px;">
				@endif
				<h4 style="padding-bottom: 23px;">{{$login->name}}</h4>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="/done/{{$login->id}}" class="btn btn-block btn-success">Achievement list</a></div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><a href="/giveup/{{$login->id}}" class="btn btn-block btn-warning">Give up list</a></div>
			</div> <!-- /.col-xx-6 -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				@if ($errors->any())
			        <div class="alert alert-danger">
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
		    	@endif
				<form action="/store/{{$login->id}}" method="POST">
					<br><h3 style="margin-top: 0px;">【add item】</h3>
					<div class="flex_test-box">
						<h4 style="width: 100px;">item name</h4>
						<input class="flex_test-item" type="text" name="item" style="width: 100%;">
					</div>
					<div class="flex_test-box">
						<h4 style="width: 100px;">category</h4>
						<div class="btn-group flex_test-item" data-toggle="buttons" style="width: 100%;">
							<label class="btn btn-default active" style="width: calc(100%/3);">
								<input type="radio" name="category_code" autocomplete="off" value="1" checked>Want to do
							</label>
							<label class="btn btn-default" style="width: calc(100%/3);">
								<input type="radio" name="category_code" autocomplete="off" value="2">Want to be
							</label>
							<label class="btn btn-default" style="width: calc(100%/3);">
								<input type="radio" name="category_code" autocomplete="off" value="3">Things wanted
							</label>
		    			</div>
	    			</div>
					<div class="flex_test-box">
						<h4 style="width: 100px;">limit</h4>
						<input class="flex_test-item" type="date" name="limit_date" style="width: 100%;">
					</div>
					<div class="flex_test-box">
						<h4 style="width: 100px;">rank</h4>
						<select name="rank_code" style="height: 34px; width: 100%;">
							<option value="0" checked>no rank</option>
							<option value="1">top 1</option>
							<option value="2">top 2</option>
							<option value="3">top 3</option>
							<option value="4">top 4</option>
							<option value="5">top 5</option>
						</select>
					</div>
					<div class="flex_test-box">
						<div style="width: 100px;"></div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="submit" class="btn btn-block btn-primary" style="height: 34px; width: 100%;">
					</div>
				</form>
			</div> <!-- /.col-xx-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
				<div class="tabs">
					<input id="do" type="radio" name="tab_item" checked>
					<label class="tab_item" for="do">WANT TO DO</label>
					<input id="be" type="radio" name="tab_item">
					<label class="tab_item" for="be">WANT TO BE</label>
					<input id="thing" type="radio" name="tab_item">
					<label class="tab_item" for="thing">THINGS WANTED</label>
					{{-- やりたいことタブ --}}
					<div class="tab_content" id="do_content">
						<div class="tab_content_description">
							<div class="section">
								<div class="container">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<table class="table table-hover table-striped">
												<thead>
													<tr>
														<th style="width: 10%;">rank</th>
														<th style="width: 20%;">what you want to do</th>
														<th style="width: 20%;">limit</th>
														<th style="width: 20%;">edit rank</th>
														<th style="width: 15%;">done</th>
														<th style="width: 15%;">・・・</th>
													</tr>
												</thead>
												<tbody>
													@foreach($items as $item)
														@if($item->category_code == 1 && $item->status_code == 1)
															<tr>
																<td> {{-- rank --}}
																	@if($item->rank_code == 0) {{-- ランク外は非表示 --}}

																	@elseif($item->rank_code == 1) {{-- ランク一位は1を表示 --}}
																		1
																	@elseif($item->rank_code == 2) {{-- ランク二位は2を表示 --}}
																		2
																	@elseif($item->rank_code == 3) {{-- ランク三位は3を表示 --}}
																		3
																	@elseif($item->rank_code == 4) {{-- ランク四位は4を表示 --}}
																		4
																	@elseif($item->rank_code == 5) {{-- ランク五位は5を表示 --}}
																		5
																	@endif
																</td>
																<td> {{-- item --}}
																	<a href="/todo/{{$item->id}}"> {{-- 各アイテムのtodoリストへ遷移 --}}
																		<p>{{$item->item}}</p> {{-- アイテム名 --}}
																	</a>
																</td>
																<td> {{-- limit --}}
																	<p>{{$item->limit_date->format('Y/m/d')}}</p> {{-- 達成期限 --}}
																</td>
																<form action="/rank_update/{{$item->id}}" method="POST">
																	<td> {{-- edit rank --}}
																		<select name="rank_code" style="">
																			<option value="0" checked>no rank</option>
																			<option value="1">top 1</option>
																			<option value="2">top 2</option>
																			<option value="3">top 3</option>
																			<option value="4">top 4</option>
																			<option value="5">top 5</option>
																		</select>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="Edit" class="btn btn-info">
																	</td>
																</form>
																<form action="/update/{{$item->id}}" method="POST">
																	<td> {{-- done --}}
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="done!" class="btn btn-success">
																	</td>
																</form>
																<form action="/giveup/{{$item->id}}" method="POST">
																	<td> {{-- give up --}}
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="give up" class="btn btn-warning">
																	</td>
																</form>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										</div> <!-- /.col-xx-12 -->
									</div> <!-- /.row -->
								</div> <!-- /.container -->
							</div> <!-- /.section -->
						</div> <!-- /.tab_content_description -->
					</div> <!-- /.tab_content -->
					{{-- なりたい自分タブ --}}
					<div class="tab_content" id="be_content">
						<div class="tab_content_description">
							<div class="section">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<table class="table table-hover table-striped">
												<thead>
													<tr>
														<th style="width: 10%;">rank</th>
														<th style="width: 20%;">what you want to be</th>
														<th style="width: 20%;">limit</th>
														<th style="width: 20%;">edit rank</th>
														<th style="width: 15%;">done</th>
														<th style="width: 15%;">・・・</th>
													</tr>
												</thead>
												<tbody>
													@foreach($items as $item)
														@if($item->category_code == 2 && $item->status_code == 1)
															<tr>
																<td>
																	@if($item->rank_code == 0)

																	@elseif($item->rank_code == 1)
																		1
																	@elseif($item->rank_code == 2)
																		2
																	@elseif($item->rank_code == 3)
																		3
																	@elseif($item->rank_code == 4)
																		4
																	@elseif($item->rank_code == 5)
																		5
																	@endif
																</td>
																<td>
																	<a href="/todo/{{$item->id}}">
																		<p>{{$item->item}}</p>
																	</a>
																</td>
																<td>
																	<p>{{$item->limit_date->format('Y/m/d')}}</p>
																</td>
																<form action="/rank_update/{{$item->id}}" method="POST">
																	<td>
																		<select name="rank_code" style="">
																			<option value="0" checked>no rank</option>
																			<option value="1">top 1</option>
																			<option value="2">top 2</option>
																			<option value="3">top 3</option>
																			<option value="4">top 4</option>
																			<option value="5">top 5</option>
																		</select>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="Edit" class="btn btn-info">
																	</td>
																</form>
																<form action="/update/{{$item->id}}" method="POST">
																	<td>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="done!" class="btn btn-success">
																	</td>
																</form>
																<form action="/giveup/{{$item->id}}" method="POST">
																	<td>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="give up" class="btn btn-warning">
																	</td>
																</form>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										</div> <!-- /.col-xx-12 -->
									</div> <!-- /.row -->
								</div> <!-- /.container -->
							</div> <!-- /.section -->
						</div> <!-- /.tab_content_description -->
					</div> <!-- /.tab_content -->
					{{-- ほしいモノタブ --}}
					<div class="tab_content" id="thing_content">
						<div class="tab_content_description">
							<div class="section">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<table class="table table-hover table-striped">
												<thead>
													<tr>
														<th style="width: 10%;">rank</th>
														<th style="width: 20%;">what you want</th>
														<th style="width: 20%;">limit</th>
														<th style="width: 20%;">edit rank</th>
														<th style="width: 15%;">done</th>
														<th style="width: 15%;">・・・</th>
													</tr>
												</thead>
												<tbody>
													@foreach($items as $item)
														@if($item->category_code == 3 && $item->status_code == 1)
															<tr>
																<td>
																	@if($item->rank_code == 0)

																	@elseif($item->rank_code == 1)
																		1
																	@elseif($item->rank_code == 2)
																		2
																	@elseif($item->rank_code == 3)
																		3
																	@elseif($item->rank_code == 4)
																		4
																	@elseif($item->rank_code == 5)
																		5
																	@endif
																</td>
																<td>
																	<a href="/todo/{{$item->id}}">
																		<p>{{$item->item}}</p>
																	</a>
																</td>
																<td>
																	<p>{{$item->limit_date->format('Y/m/d')}}</p>
																</td>
																<form action="/rank_update/{{$item->id}}" method="POST">
																	<td>
																		<select name="rank_code" style="">
																			<option value="0" checked>no rank</option>
																			<option value="1">top 1</option>
																			<option value="2">top 2</option>
																			<option value="3">top 3</option>
																			<option value="4">top 4</option>
																			<option value="5">top 5</option>
																		</select>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="Edit" class="btn btn-info">
																	</td>
																</form>
																<form action="/update/{{$item->id}}" method="POST">
																	<td>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="done!" class="btn btn-success">
																	</td>
																</form>
																<form action="/giveup/{{$item->id}}" method="POST">
																	<td>
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="submit" value="give up" class="btn btn-warning">
																	</td>
																</form>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										</div> <!-- /.col-xx-12 -->
									</div> <!-- /.row -->
								</div> <!-- /.container -->
							</div> <!-- /.section -->
						</div> <!-- /.rab_content_description -->
					</div> <!-- /.tab_content -->
				</div> <!-- /.tabs -->
			</div> <!-- /.col-xx-12 -->
		</div> <!-- /.row -->
	</div> <!-- /.container-fluid -->
@endsection
