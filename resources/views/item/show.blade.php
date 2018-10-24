@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				@if($user->profile_picture_path)
					<div><img src="{{ asset('images/profile_picture_data') . '/' . $user->id . '_' . $user->profile_picture_path }}" style="border-radius: 50%; width: 150px; height: 150px;"><p style="padding-bottom: 23px;">{{$user->name}}</p></div>
				@else
					<div><img src="{{ asset('images/profile_picture_data/seedkun.png') }}" style="border-radius: 50%; width: 150px; height: 150px;"><p style="padding-bottom: 23px;">{{$user->name}}</p></div>
				@endif
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"><a href="/done/{{$user->id}}" class="btn btn-block btn-success">Achievement list</a></div>
			</div> <!-- /.col-xx-12 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
				<div class="tabs">
					<input id="do" type="radio" name="tab_item" checked>
					<label class="tab_item" for="do">WHAT TO DO</label>
					<input id="be" type="radio" name="tab_item">
					<label class="tab_item" for="be">WHAT TO BE</label>
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
														<th style="width: 20%;">rank</th>
														<th style="width: 60%;">what you want to do</th>
														<th style="width: 20%;">limit</th>
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
														<th style="width: 20%;">rank</th>
														<th style="width: 60%;">what you want to be</th>
														<th style="width: 20%;">limit</th>
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
														<th style="width: 20%;">rank</th>
														<th style="width: 60%;">what you want</th>
														<th style="width: 20%;">limit</th>
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
				</div>
			</div>
		</div>
	</div>
@endsection
