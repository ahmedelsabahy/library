@extends('incloud.layout')

@section('title')
    creat book
@endsection

@section('body')
    @include('incloud.error')
    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">TITLE vategory</label>
            <input type="text" class="form-control" name="cname" value="{{ old('cname') ?? $category->name }}"
                placeholder="name">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm edit</button> </br>
            <a class="btn btn-success" href="{{ route('categories.index') }}"> back </a>
        </div>

    </form>
@endsection
