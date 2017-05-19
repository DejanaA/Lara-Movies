@extends('welcome')
@section('centerSection')
<div class="container">
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		  	<form action="{!! route('UpdateMovie',['movie_id' => $movies->id])!!}" method="POST">
		  		{{ csrf_field() }}
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">{{$movies->name}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="input-group input-group InputHolder">
				  
				  <input type="text" name="movieName" value="{{$movies->name}}"  class="form-control"  aria-describedby="sizing-addon1">
				</div>
				<div class="input-group input-group InputHolder">
				  
				  <input type="text" name="description" value="{{$movies->description}}" class="form-control"  aria-describedby="sizing-addon1">
				</div>
				<div class="input-group input-group InputHolder">
				  <input type="text" name="genre" class="form-control" value="{{$movies->genre_id}}"  aria-describedby="sizing-addon1">
				</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
			</form>
		  </div>
</div>
	
	<div class="jumbotron" style="margin:70px">
		<h1>{{$movies->name }}</h1>
		<p>{{$movies->description }}</p>
		<p>{{$movies->genre->name}} </p>

		<video  style="margin-left:30px; background-color:gray;"width="320" height="240" controls>
		 	<p></p>
		  <source src="movie.mp4" type="video/mp4">
		  <source src="movie.ogg" type="video/ogg">
		</video>
		<div class="container" style="margin-top:30px">
		@if(Auth::check())
		@if(Auth()->user()->isAdmin())
              <a href="" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Edit</a>
              <a href="{!! route('DeleteMovie',['movie_id' => $movies->id])!!} " type="button"class="btn btn-danger">Delete</a>
         @endif	
         @endif
	</div>
</div>

	<div>
		@if(Auth::check())
		<form action="{!!route('Comments')!!}" method="POST" >
			{{ csrf_field() }}
				<input type="hidden" name="movie_id" value="{{ $movies->id }}">
				<textarea name="commentText" placeholder="Post a comment..." style="width: 560px ;font-size:1em;"></textarea>
				</br><input type="submit" value="Post" class="btn btn-primary">				
		</form>
		@endif
		<div class="panel panel-default col-md-8" style=" padding-right:0px; padding-left:0px; ">			
			@foreach($comments as $comment)
		  <div class="panel-heading"> 
		  	{{$comment->user->name}} 

		  	@if(Auth::check())
			  	@if($comment->user->id == Auth::user()->id)
			  	(you)
			  	@endif
			 @endif 	  	
		  	<span class="pull-right">
		  	{{$comment->created_at->format('m/d/Y')}}
		  	@if(Auth::check())
		  	@if(count($comment->likes) == 0)
		  	<a href="{!! route('Likes',['movieName' => $movies->name , 'comment_id' => $comment->id ])!!}">
				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
				</span>
			</a>
			@endif

			  	@foreach($comment->likes as $like)
				  	@if($like->user_id != Auth::user()->id)		
					  	<a href="{!! route('Likes',['movieName' => $movies->name , 'comment_id' => $comment->id ])!!}">
					  	<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">
					  	</span>
					  	</a>
				  	@endif
			  	@endforeach
		  	@endif
		  	@if(count($comment->likes)!= 0)
			  		{{count($comment->likes)}}
			@endif
				
		  </div>
		  <div class="panel-body">
		    {{ $comment->commentText}}
		  </div>
		  @endforeach		  
		</div>
	</div>	
</div>
@endsection















