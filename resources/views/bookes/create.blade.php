@extends('incloud.layout')

@section('title')
    creat book
@endsection

@section('body')
@include('incloud.error')

<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
  @csrf
<div>
    <label for="exampleFormControlInput1" class="form-label">TITLE BOOKS</label>
    <input type="text" class="form-control" name="titlename" placeholder="name book">
  </div>
  <div>
    <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
    <textarea class="form-control" name="descname" rows="3"></textarea>
  </div> 
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" name="img">
  </div>
    @foreach ($categories as $category)

  <div class="form-check">
          <input class="form-check-input" type="checkbox" name="categoryids[]" value=" {{ $category->id }}" id="flexCheckChecked" checked>
    <label class="form-check-label" for="flexCheckChecked">
        {{ $category->name }}
    </label>
  </div> 
  @endforeach
</br>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm create</button> </br>
    <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
  </div>
  

@endsection