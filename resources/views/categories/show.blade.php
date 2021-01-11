@extends('bookes.layout')

@section('body')
    <h3> book id {{ $category->id }} </h3>
    <h5> {{ $category->name }} </h5>

    <a class="btn btn-success" href="{{ route('categories.index') }}"> back </a>
@endsection
