@extends("welcome")
@section('centerSection')
<div class="container" >
	<div class="row" >
		<div class="col-md-4 col-centered" >
			<form method="POST" action="{!! route('LoginUser')!!}">
				{{ csrf_field() }}
					<div class="form-group row">
					  <label for="example-email-input" class="col-2 col-form-label">Email</label>
					  <div class="col-10">
					    <input class="form-control" name="email" type="text"  id="example-email-input">
					  </div>
					  @if($errors->has('email'))
					    	<strong>{{$errors->first('email') }}</strong>
					   @endif
					</div>
					<div class="form-group row">
					  <label for="example-url-input" class="col-2 col-form-label">Password</label>
					  <div class="col-10">
					    <input class="form-control" name="password" type="password"  id="example-url-input">
					  </div>
					  @if($errors->has('password'))
					    	<strong>{{$errors->first('password') }}</strong>
					   @endif
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>

@endsection