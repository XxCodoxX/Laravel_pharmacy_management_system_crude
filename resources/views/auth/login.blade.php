@extends('layout.app')

@section('content')
<br>
<br>
<p class="h1 text-center">Welcome to Pharmacy Management System</p>
<div class="container">
<form action="{{ route('login_user') }}" method="POST">
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif
    @csrf
    <div class="form-group">
        <label for="user_Name">User Name</label>
        <input type="text" class="form-control" name="userName" id="userName" value="{{ old('userName') }}">
        <span class="text-danger">@error('userName') {{ $message }}@enderror</span>
    </div>
    <div class="form-group">
        <label for="password">User Password</label>
        <input type="password" class="form-control" name="userPassword" id="userPassword">
        <span class="text-danger">@error('userPassword') {{ $message }}@enderror</span>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <br>
    <br>

</form>
</div>


@endsection
