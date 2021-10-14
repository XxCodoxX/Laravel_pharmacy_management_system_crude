
@extends('layout.app')

@section('content')

<br>
<!--Customer Add Model satrt -->

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('customerresource.store') }}" method="POST">
        <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="cus_Name">Customer Name</label>
                    <input type="text" class="form-control" name="cusName" id="cusName" value="{{ old('cusName') }}">
                    <span class="text-danger">@error('cusName') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="cus_age">Customer Age</label>
                    <input type="number" class="form-control" name="cusAge" id="cusAge" value="{{ old('cusAge') }}">
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
                    <input type="number" class="form-control" name="cusmnumber" id="cusmnumber" value="{{ old('cusmnumber') }}">
                    <span class="text-danger">@error('cusmnumber') {{ $message }}@enderror</span>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <!-- Customer Add Model finished -->


<div class="container">
    <h1>Customer</h1>
<!-- Action msg -->
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

<!-- Button trigger modal -->
{{-- <h1>{{ $data1 }}</h1> --}}
@if ( $data1  == 'admin')
 <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
    Add new Customer
  </button>
  @else

  <button disabled type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
    Add new Customer
  </button>
  @endif
  <br>
  <br>
  <br>
  <br>

  <table class="table" id="custable">
    @php
    $i = 1
    @endphp
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Age</th>
        <th scope="col">Customer Gender</th>
        <th scope="col">Customer Mo.Number</th>
        <th scope="col">Stetus</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($all as $cus_details)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $cus_details->cus_name }}</td>
        <td>{{ $cus_details->cus_age }}</td>
        <td>{{ $cus_details->cus_sex }}</td>
        <td>{{ $cus_details->cus_mno }}</td>
        <td>


            @if ($data1 === 'admin')

            <form action="{{ route('customerresource.destroy',$cus_details->cus_id)}}" method="POST">

                <a class="btn btn-primary" href="{{ route('customerresource.edit',$cus_details->cus_id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>

            @elseif ($data1 == 'manager')

            <form action="{{ route('customerresource.destroy',$cus_details->cus_id)}}" method="POST">

                <a class="btn btn-primary" href="{{ route('customerresource.edit',$cus_details->cus_id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>

            @else

            ----

            @endif


        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>




@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready( function () {
    var custabel = $('#custable').DataTable();
} );
</script>
@endsection
