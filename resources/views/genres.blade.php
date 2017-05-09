@extends("welcome")
@section('centerSection')
<div class="container" >
	<ul class="list-group">
	@foreach ($genres as $genre)
    <li class="list-group-item" id="zanrovi" style="width:20%"><a style="color:black" href="{!!route('Movies',['id'=> $genre->name])!!}">{{$genre->name}}</a></li>
    @endforeach
  </ul>
</div>
@endsection

