@extends('bookes.layout')

@section('body')
    <h3> book id {{ $value->id }} </h3>
    <h5> {{ $value->title }} </h5>
    <p> {{ $value->desc }} </p>

    <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
@endsection
