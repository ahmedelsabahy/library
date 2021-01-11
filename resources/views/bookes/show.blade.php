@extends('bookes.layout')

@section('body')
    <h3> book id {{ $book->id }} </h3>
    <h5> {{ $book->title }} </h5>
    <p> {{ $book->desc }} </p>

    <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
@endsection
