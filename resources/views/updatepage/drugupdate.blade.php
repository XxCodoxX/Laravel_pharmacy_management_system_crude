@extends('layout.app')

@section('content')

<br>
<br>

<div class="container">

    <div class="card">
        <div class="card-body">
            <h1>Update Drug Details</h1>

            <br>
            <br>

            <form action="{{ route('druginventoryupdate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control" name="drugId" id="drugId" value="{{ $editRow->drug_id }}">
                    <label for="drug_Name">Drug Name</label>
                    <input type="text" class="form-control" name="drugName" id="drugName" value="{{ $editRow->drug_name }}">
                    <span class="text-danger">@error('drugName') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="drug_serial_number">Drug Serial Number</label>
                    <input type="number" class="form-control" name="drugSnum" id="drugSnum" value="{{ $editRow->drug_serial_number }}">
                    <span class="text-danger">@error('drugSnum') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="drug_quantity">Drug Quantity</label>
                    <input type="number" class="form-control" name="drugQu" id="drugQu" value="{{ $editRow->drug_quantity }}">
                    <span class="text-danger">@error('drugQu') {{ $message }}@enderror</span>
                </div>
                <div class="container">
                <div class=" row float-right">
                <button type="submit" class="btn btn-primary p-2 m-2">Update</button>
                <a class="btn btn-secondary p-2 m-2" href="{{ route('druginventory') }}">Cancel</a>
                </div>
                </div>
                <br>
                <br>

            </form>
        </div>
      </div>

</div>










@endsection
