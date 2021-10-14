@extends('layout.app')

@section('content')

<br>
<br>
<p class="h1 text-center">Register in Pharmacy Management System</p>
<div class="container">
<form action="{{ route('register_user') }}" method="POST">
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
        <input type="password" class="form-control" name="userPassword" id="userPassword" >
        <span class="text-danger">@error('userPassword') {{ $message }}@enderror</span>
    </div>
    <div class="form-group">
        <label for="Gender">User Gender</label>
        <select name="usersex" id="usersex" class="form-control">
            <option selected>Choose...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
    </div>
    <div class="form-group">
        <label for="mobile_number">User Mobile Number</label>
        <input type="number" class="form-control" name="usermnumber" id="usermnumber" value="{{ old('usermnumber') }}">
    </div>
    <div class="form-group">
        <label for="mobile_number">User Type </label>
        <select name="userType" id="userType" class="form-control">
            <option selected>Choose...</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="cashier">Cashier</option>
          </select>

    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <br>
    <br>

</form>
</div>








@endsection
