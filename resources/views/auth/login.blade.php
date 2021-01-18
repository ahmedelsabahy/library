@extends('incloud.layout')

@section('title')
    login
@endsection

@section('body')
    @include('incloud.error')

    <form method="POST" action="{{ route('auther.handelogin') }}">
        @csrf
        <h1 style="text-align: center">login </h1>
    
        <div>
            <label for="exampleFormControlInput1" class="form-label">email</label>
            <input type="text" class="form-control" name="email" placeholder="email ">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">passwordword</label>
            <input type="password" class="form-control" name="password" placeholder="pasword ">
        </div>
        </br>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Register</button> </br>
        </div>
    </form>
    <a href="{{ route('githup.redirect') }}" class="btn btn-success mb-3">Register by git hub </button> </a>


    @endsection
