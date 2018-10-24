@extends('layout')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-10 col-xs-offset-1">
				<h1>SELF COACHING WORK</h1>
				<p>With a clear goal and determination let's move forward step by step.<br>
				Please fill out self coaching form with its time limit and submit after.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				@if ($errors->any())
			        <div class="alert alert-danger">
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif
				<form action="/items/store/{{$login->id}}" method="POST">
					<div class="form-group">
						<div class="row">
							<h2>What do you want to do?</h2>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>1.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="1">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>2.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="1">
							</div>
							<br>
							<h2>What do you want to be?</h2>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>1.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="2">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>2.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="2">
							</div>
							<br>
							<h2>What do you want?</h2>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>1.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="3">
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>2.</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="text" name="item" style="width: 80%; text-align: right;" value="" required>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" style="padding-top: 3px; text-align: right;"><strong>time limit</strong></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">
								<input type="date" name="limit_date" style="width: 80%; text-align: right;" value="" required>
								<input type="hidden" name="user_id" value="{{ $login->id }}">
								<input type="hidden" name="category_code" value="3">
							</div>
							<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-offset-10"><br>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" value="SUBMIT" class="btn btn-block btn-info">
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.form-group -->
				</form> <!-- /form -->
			</div> <!-- /.col-xx-10 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
@endsection
