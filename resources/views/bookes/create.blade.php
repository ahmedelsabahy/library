@extends('bookes.layout')

@section('title')
    creat book
@endsection

@section('body')
<form method="POST" action="{{ route('books.store') }}">
  @csrf
<div>
    <label for="exampleFormControlInput1" class="form-label">TITLE BOOKS</label>
    <input type="text" class="form-control" name="titlename" placeholder="name book">
  </div>
  <div>
    <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
    <textarea class="form-control" name="descname" rows="3"></textarea>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm create</button> </br>
    <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
  </div>
</form>

@endsection