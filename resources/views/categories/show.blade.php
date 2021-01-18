@extends('incloud.layout')

@section('body')
    <h3> book id {{ $category->id }} </h3>
    <h5> {{ $category->name }} </h5>
    <h5> books </h5>
    <ul>
    @foreach ($category->books as $book)
       <li> {{$book->title}} </li>
    @endforeach
    </ul>
    <a class="btn btn-success" href="{{ route('categories.index') }}"> back </a>
@endsection
