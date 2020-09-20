@extends('layouts.admin')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaction</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$items->id}}</td>
                </tr>
                <tr>
                    <th>Paket Travel</th>
                    <td>{{$items->travel_package->title}}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{$items->user->username}}</td>
                </tr>
                <tr>
                    <th>Additional Visa</th>
                    <td>${{$items->additional_visa}}</td>
                </tr>
                <tr>
                    <th>Total transacton</th>
                    <td>${{$items->transaction_total}}</td>
                </tr>
                <tr>
                    <th>Status Transaction</th>
                    <td>{{$items->transaction_status}}</td>
                </tr>
                <tr>
                    <th>Pembelian</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Natonality</th>
                                <th>Visa</th>
                                <th>Doe passport</th>
                            </tr>
                            @foreach($items->details as $i)
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->username}}</td>
                                    <td>{{$i->nationality}}</td>
                                    {{-- konditional if dengan tenary function --}}
                                    {{-- jika is visa = true maka hasilnya 30 days --}}
                                    {{-- jika is visa = false maka hasilnya N/A --}}
                                    <td>{{$i->is_visa ? '30 days' : 'N/A'}}</td>
                                    <td>{{$i->doe_passport}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
  </div>


</div>
@endsection