@extends('layouts.admin')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Paket Travel</h1>
  </div>

  <div class="row">
    <div class="card-body">
    <div class="card shadow">
       @if($errors->any())
       <div class="alert alert-danger">
           <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
           </ul>
       </div>
       @endif
        <div class="card-body">
            <form action="{{route('transaction.update',$items->id)}}" method="post"> 
                @method('put')
                @csrf
                <div class="form-group">
                    <label>Transaction status</label>
                    <select name="transaction_status" required class="form-control">
                        <option value="{{$items->transaction_status}}">
                            Jangan ubah ({{$items->transaction_status}})
                        </option>
                        <option value="IN_CARD">In Card</option>
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Success</option>
                        <option value="CANCEL">Cancel</option>
                        <option value="FAILED">Failed</option>
                    </select>
                </div>
                 <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit">submit</button>
            </form>
        </div>
    </div>
    </div>
  </div>


</div>
@endsection