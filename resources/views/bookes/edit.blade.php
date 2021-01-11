@extends('bookes.layout')

@section('title')
    creat book
@endsection

@section('body')
    @include('incloud.error')
    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">TITLE BOOKS</label>
            <input type="text" class="form-control" name="titlename" value="{{ old('titlename') ?? $book->title }}"
                placeholder="name book">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">DESCRIPTION</label>
            <textarea class="form-control" name="descname" rows="3"> {{ old('descname') ?? $book->desc }} </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" name="img">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm edit</button> </br>
            <a class="btn btn-success" href="{{ route('books.index') }}"> back </a>
        </div>

    </form>
@endsection
