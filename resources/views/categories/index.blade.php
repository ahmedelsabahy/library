@extends('bookes.layout')
@section('title')
    frist laravel category
@endsection
@section('body')

    <h1> all categories </h1>
    <a class="btn btn-warning" href="{{ route('categories.create') }}"> CREATE category  </a> 

    @foreach ($values as $value)
        <!--values de ellshayla el get bookes f bookcontrol ###  value  de varibal  -->
        <a href="{{ route('categories.show', $value->id) }}">
            <h3> {{ $value->name }} </h3>
        </a>
        <a class="btn btn-success" href="{{ route('categories.edit' , $value->id) }}"> edit </a> 
        <a class="btn btn-primary" href="{{ route('categories.show' , $value->id) }}"> show </a> 
        <a class="btn btn-danger" href="{{ route('categories.delete' , $value->id) }}"> delete </a> 
 
    @endforeach
    </br> </br>
    {{ $values->render() }}    <!-- ببحث علي الكتاب بي id -->
</br>

@endsection 
</br>
