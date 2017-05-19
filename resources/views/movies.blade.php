@extends("welcome")
@section('centerSection')

	<div class="container">	
	
	@foreach($movies as $movie)	
		<div class="panel-group col-md-4">
			<div class="panel panel-default " style="margin: 15px" >
			    <div class="panel-heading" style="background-color:#f2f3f4"><a style="color:black;"  href="{!!route('MovieDetails',['id'=> $movie->name])!!}">{{$movie->name}}</a></div>
			    <!-- <div class="panel-body" ><h5>{{$movie->description}}</h5></div> -->
			    <img src="" alt="" style="width:250px;height:220px; margin:25px; ">
			</div>
		</div>
	@endforeach

		{{$movies->links()}}

@endsection



