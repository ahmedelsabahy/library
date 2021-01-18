@extends('incloud.layout')

@section('body')
    <h3> book id {{ $book->id }} </h3>
    <h5> {{ $book->title }} </h5>
    <p> {{ $book->desc }} </p>
    <h3>category</h3>
    <ul> 
        
    @foreach ($book->categories as $category)
   <li> {{ $category->name }} </li>

    @endforeach </br>
    </ul>
    <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
@endsection
