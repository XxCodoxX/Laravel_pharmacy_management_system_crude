
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
        <form action="{{ route('druginventoryresource.store') }}" method="POST">
        <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="drug_Name">Drug Name</label>
                    <input type="text" class="form-control" name="drugName" id="drugName" value="{{ old('drugName') }}">
                    <span class="text-danger">@error('drugName') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="drug_serial_number">Drug Serial Number</label>
                    <input type="number" class="form-control" name="drugSnum" id="drugSnum" value="{{ old('drugSnum') }}">
                    <span class="text-danger">@error('drugSnum') {{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="drug_quantity">Drug Quantity</label>
                    <input type="number" class="form-control" name="drugQu" id="drugQu" value="{{ old('drugQu') }}">
                    <span class="text-danger">@error('drugQu') {{ $message }}@enderror</span>
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
    <h1>Drug Inventory</h1>
<!-- Action msg -->
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

<!-- Button trigger modal -->
@if ( $data1  == 'admin')
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
    Add new Item
  </button>
  @else

  <button disabled type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
    Add new Item
  </button>
  @endif


  <br>
  <br>
  <br>
  <br>

  <table class="table" id="drugtable">
    @php
    $i = 1
    @endphp
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Drug Name</th>
        <th scope="col">Drug Serial Number</th>
        <th scope="col">Drug Quantity</th>
        <th scope="col">Stetus</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($all as $cus_details)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $cus_details->drug_name }}</td>
        <td>{{ $cus_details->drug_serial_number }}</td>
        <td>{{ $cus_details->drug_quantity }}</td>
        <td>


            @if ($data1 == 'admin')
            <form action="{{ route('druginventoryresource.destroy',$cus_details->drug_id)}}" method="POST">

                <a class="btn btn-primary" href="{{ route('druginventoryresource.edit',$cus_details->drug_id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>
            @elseif ($data1 == 'cashier')

            <form action="{{ route('druginventoryresource.destroy',$cus_details->drug_id)}}" method="POST">

                <a class="btn btn-primary" href="{{ route('druginventoryresource.edit',$cus_details->drug_id)}}">Edit</a>

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
    var custabel = $('#drugtable').DataTable();
} );
</script>
@endsection
