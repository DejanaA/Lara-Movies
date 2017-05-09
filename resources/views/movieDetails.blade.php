@extends('welcome')
@section('centerSection')
<div class="container">
	<div class="jumbotron" style="margin:70px">
		<h1>{{ $movies->name }}</h1>
		<p>{{ $movies->description }}</p>
		<p>{{$movies->genre->name}} </p>

		<video  style="margin-left:70px; background-color:gray;"width="320" height="240" controls>
		 	<p></p>
		  <source src="movie.mp4" type="video/mp4">
		  <source src="movie.ogg" type="video/ogg">
		</video>		  
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















