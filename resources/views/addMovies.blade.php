@extends("dashboard")
@section('centerSection')

<form action="{!! route('AddNewMovie')!!}" method="POST" >
	{{ csrf_field() }}
	 <h2>Add new Movie</h2>
  Movie name:<br>
  <input type="text" name="movieName" value=""style="width: 560px">
  
    @if($errors->has('movieName'))
       <p> <strong>{{$errors->first('movieName') }}</strong></p>
     @endif
  <br><br>
  Description:<br>
  <textarea type="text" name="description" value="" style="width: 560px; height:250px "></textarea>
  @if($errors->has('description'))
       <p> <strong>{{$errors->first('description') }}</strong></p>
     @endif
  <br>
  Genre:<br>
  <input type="text" name="genre" value="" style="width: 560px">
  @if($errors->has('genre'))
       <p> <strong>{{$errors->first('genre') }}</strong></p>
     @endif
  <br><br>
  <input type="submit" value="Add">
 

</form> 

@endsection