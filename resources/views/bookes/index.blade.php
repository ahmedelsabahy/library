@extends('incloud.layout')
@section('title')
    frist laravel
@endsection
@section('body')

    <h1> all bookes </h1>
    <a class="btn btn-warning" href="{{ route('books.create') }}"> CREATE BOOKS </a>

    @foreach ($values as $value)
        <!--values de ellshayla el get bookes f bookcontrol ###  value  de varibal  -->
        <a href="{{ route('books.show', $value->id) }}">
            <h3> {{ $value->title }} </h3>
        </a>
        <p>{{ $value->desc }} </p>
        @if (Auth::check() && Auth::user()->is_admin == 1)
            <a class="btn btn-danger" href="{{ route('books.delete', $value->id) }}"> delete </a>
        @endif
        <a class="btn btn-success" href="{{ route('books.edit', $value->id) }}"> edit </a>

        <a class="btn btn-primary" href="{{ route('books.show', $value->id) }}"> show </a>



    @endforeach
    </br> </br>


    {{ $values->render() }} <!-- ببحث علي الكتاب بي id -->


@endsection
