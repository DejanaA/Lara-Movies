@extends("welcome")
@section('centerSection')

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
    margin-top: 30px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color:;
}

</style>


<div class="container">

<table >
	<tr style="background-color: #dddddd">
        <td>Movie Name</td>
        <td>Description</td>
        <td>Genre</td>
        <td></td>
        <td></td>
    </tr>
    @foreach($movies as $movie)
        <tr>
            <td>{{$movie->name}} </td>
            <td>{{$movie->description}}</td>
            <td>{{$movie->genre_id}}</td>
            <td><a href="" type="button" class="btn btn-default">Edit</a></br></td>
            <td><a href="" type="button">Delete</a></br></td>
        </tr>
    @endforeach
</table>

<a href="{!! route('AddMovie') !!}" type="button">Add new</a></br>
 

 

</div>
@endsection
