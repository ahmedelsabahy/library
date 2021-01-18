@extends('incloud.layout')

@section('title')
    registeration
@endsection

@section('body')
    @include('incloud.error')

    <form method="POST" action="{{ route('auther.handelregister') }}">
        @csrf
        <h1 style="text-align: center">registeration </h1>
        <div>
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input type="text" class="form-control" name="name" placeholder="name ">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">email</label>
            <input type="text" class="form-control" name="email" placeholder="email ">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">password</label>
            <input type="password" class="form-control" name="password" placeholder="pasword">
        </div>
        </br>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Register</button> </br>
        </div>
    </form>
    <a href="{{ route('githup.redirect') }}" class="btn btn-success mb-3">Register by git hub </button> </a>



    @endsection
