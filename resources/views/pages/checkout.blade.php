@extends('layouts.app')

@section('title')
    Nomads-Checkouts
@endsection

@section('content')
    <main>
      <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Paket Travel</li>
                  <li class="breadcrumb-item">Details</li>
                  <li class="breadcrumb-item active">Checkouts</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                 @if($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                       </ul>
                   </div>
                 @endif
                <h1>Who is going</h1>
                <p>
                  Trip to {{$item->travel_package->title}}, {{$item->travel_package->location}}
                </p>
                <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td>Picture</td>
                        <td>name</td>
                        <td>nationality</td>
                        <td>visa</td>
                        <td>passport</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($item->details as $detail)
                      <tr>
                        <td> 
                          <img src="https://ui-avatars.com/api/?name={{$detail->username}}" class="rounded-circle" height="60" />
                        </td>
                        <td class="align-middle">{{$detail->username}}</td>
                        <td class="align-middle">{{$detail->nationality}}</td>
                        <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                        <td class="align-middle">
                            {{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Actiive' : 'In Active'}}
                        </td>
                        <td class="align-middle">
                          <a href="{{route('checkout-remove', $detail->id)}}">
                            <img src="{{url('frontend/images/delete.png')}}" width="15">
                          </a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="6" class="text-center">
                              Data Kosong
                          </td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>

                <!-- member -->
                <div class="member mt-3">
                  <h2>Add Member</h2>
                  <form class="form-inline ml-2" method="post" action="{{route('checkout-create',$item->id)}}">
                    @csrf
                    <div class="row">
                    <label for="inputuser" class="sr-only">Name</label>
                    <input type="text" 
                            name="username" 
                            class="form-control mb-2 mr-sm-2" 
                            id="inputuser" 
                            placeholder="Username">

                    <label for="nationality" class="sr-only">Nationality</label>
                    <input type="text" 
                            name="nationality" 
                            class="form-control mb-2 mr-sm-2" 
                            style="width: 50px;" 
                            id="nationality" 
                            placeholder="nationality">

                    <label for="is_visa" class="sr-only">Visa</label>
                    <select required class="custom-select form-control mb-2 mr-sm-2" name="is_visa">
                      <option value="">VISA</option>
                      <option value="1">30 Days</option>
                      <option value="0">N/A</option>
                    </select>

                    <!-- datepicker -->
                    <label for="doe_passport" class="sr-only">DOE Passport</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <input type="text" 
                              name="doe_passport" 
                              class="form-control datepicker" 
                              id="document" 
                              placeholder="doe_passport">
                    </div>
                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                      Add now
                    </button>
                  </div>
                  </form>
                  <h3 class="mt-2 mb-0" >
                    Note
                  </h3>
                  <p class="disclaimer2 mb-0">
                    You are only able to invite members that has registered in nomads.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Checkouts Information</h2>
                <table class="trip-information">
                  <tr>
                    <th width="50%">Members</th>
                    <td width="50%" class="text-right">{{$item->details->count()}}</td>
                  </tr>
                  <tr>
                    <th width="50%">Auditional visa</th>
                    <td width="50%" class="text-right">{{$item->additional_visa}}</td>
                  </tr>
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">${{$item->travel_package->price}},00 / person</td>
                  </tr>
                  <tr>
                    <th width="50%">SubTotal</th>
                    <td width="50%" class="text-right">${{$item->transaction_total}},00</td>
                  </tr>
                  <tr>
                    <th width="50%">Total(+Unique Code)</th>
                    <td class="text-right text-total">
                    <span class="text-blue">${{$item->transaction_total}},</span>
                    <span class="text-orange">{{mt_rand(0,99)}}</span>
                    </td>
                  </tr>
                </table>
                <hr>
                <h2>Payment Instruction</h2>
                <p class="disclaimer2">
                  Please complete your payment before to continue the wonderfull trip
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img src="{{url('frontend/images/visa.png')}}" alt="" class="bank-image" >
                    <div class="desription">
                      <h3>PT Nomads ID</h3>
                      <p>
                        0888 88 888
                        <br>
                        back central asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item pb-3">
                    <img src="{{url('frontend/images/visa.png')}}" alt="" class="bank-image">
                    <div class="desription">
                      <h3>PT Nomads ID</h3>
                      <p>
                        0888 88 888
                        <br>
                        back central asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="join-container">
                <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">I Have a Payment</a>
              </div>
              <div class="text-center mt-3">
                <a href="{{-- {{route('detail',$item->slug)}} --}}" class="text-muted">
                  Cencel Booking
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection 
@push('prepent-style')
 <!-- xzoom -->
 <link rel="stylesheet" type="text/css" href="{{url('frontend/libraries/gijgo/gijgo/dist/combined/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
  <script src="{{url('frontend/libraries/gijgo/gijgo/dist/combined/js/gijgo.min.js')}}"></script>
    <script>
      // jika documnet ready mana ..
      $(document).ready(function() {
        //date piker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
          uiLibrary: 'bootstrap4',
        });
      });
    </script>
@endpush