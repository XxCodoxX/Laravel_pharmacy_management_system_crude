@extends('layout.app')

@section('content')

<br>
<br>

<div class="container">

    <div class="card">
        <div class="card-body">
            <h1>Update Customer Details</h1>

            <br>
            <br>

            <form action="{{ route('customerupdate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control" name="cusid" id="cusid" value="{{ $editRow->cus_id }}">
                    <label for="cus_Name">Customer Name</label>
                    <input type="text" class="form-control" name="cusName" id="cusName"  value="{{ $editRow->cus_name }}">
                    <span class="text-danger">@error('cusName') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="cus_age">Customer Age</label>
                    <input type="number" class="form-control" name="cusAge" id="cusAge"  value="{{ $editRow->cus_age }}">
                    <span class="text-danger">@error('cusAge') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="Gender">Customer Gender</label>
                    <select name="cussex" id="cussex" class="form-control">
                        <option selected>Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="cus_mobile_number">Customer Mobile Number</label>
                    <input type="number" class="form-control" name="cusmnumber" id="cusmnumber"  value="{{ $editRow->cus_mno }}">
                    <span class="text-danger">@error('cusmnumber') {{ $message }}@enderror</span>
                </div>
                <div class="container">
                    <div class=" row float-right">
                    <button type="submit" class="btn btn-primary p-2 m-2">Update</button>
                    <a class="btn btn-secondary p-2 m-2" href="{{ route('customer') }}">Cancel</a>
                    </div>
                    </div>
                <br>
                <br>

            </form>
        </div>
      </div>

</div>










@endsection
