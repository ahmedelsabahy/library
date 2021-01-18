@extends('incloud.layout')

@section('title')
    creat category
@endsection

@section('body')
@include('incloud.error')

<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
  @csrf
<div>
    <label for="exampleFormControlInput1" class="form-label">TITLE category</label>
    <input type="text" class="form-control" name="cname" placeholder="name book">
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm create</button> </br>
    <a class="btn btn-success" href="{{ route('categories.index') }}"> back </a>
  </div>
  

@endsection