@extends('layouts.app')

@section('title')
    nomdas-detail
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
                  <li class="breadcrumb-item active">Details</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                <h1>{{$items->title}}</h1>
                <p>
                  {{$items->location}}
                </p>
                @if($items->galleries->count())
                <div class="gallery">
                  <div class="xzoom-container">
                    <img    src="{{Storage::url($items->galleries->first()->image)}}"          
                            alt="" 
                            class="xzoom" 
                            id="xzoom-default" 
                            xoriginal="{{Storage::url($items->galleries->first()->image)}}">
                            {{-- <img    src="{{url('frontend/images/Nusa-Penida.jpg')}}"          
                            alt="" 
                            class="xzoom" 
                            id="xzoom-default" 
                            xoriginal="{{url('frontend/images/Nusa-Penida.jpg')}}"> --}}
                  </div>
                  <div class="xzoom-thumbs">
                    @foreach($items->galleries as $i)
                    <a href="{{Storage::url($i->image)}}">
                      <img src="{{Storage::url($i->image)}}" 
                            class="xzoom-gallery" 
                            width="128" 
                            xpreview="{{Storage::url($i->image)}}">
                    </a>
                    @endforeach
                  </div>
                </div>
                @endif
                <h2>
                  Tentang Wisata
                </h2>
                <p>
                  {{$items->about}}
                </p>
                <div class="features row">
                  <div class="col-md-4">
                    <div class="description">
                      <img src="{{url('frontend\images\ticket.png')}}" class="feature-images">
                      <div class="description">
                        <h3>Feature Event</h3>
                        <p>{{$items->feature_evet}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 border-left">
                    <div class="description">
                      <img src="{{url('frontend\images\language.png')}}" class="feature-images">
                      <div class="description">
                        <h3>Language</h3>
                        <p>{{$items->language}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 border-left">
                    <div class="description">
                      <img src="{{url('frontend\images\food.png')}}" class="feature-images">
                      <div class="description">
                        <h3>Foods</h3>
                        <p>{{$items->food}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Members are going</h2>
                <div class="members my-2">
                  <img src="{{url('frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png')}}" alt="user" class="rounded-circle member-images mr-1" />
                  <img src="{{url('frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png')}}" alt="user" class="rounded-circle member-images mr-1" />
                  <img src="{{url('frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png')}}" alt="user" class="rounded-circle member-images mr-1" />
                  <img src="{{url('frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png')}}" alt="user" class="rounded-circle member-images mr-1" />
                  <img src="{{url('frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png')}}" alt="user" class="rounded-circle member-images mr-1" />
                </div>
                <hr>
                <h2>Trip Information</h2>
                <table class="trip-information">
                  <tr>
                    <th width="50%">Date of Departure</th>
                    <td width="50%" class="text-right">
                        {{\Carbon\Carbon::create($items->date_of_departure)->format('F n, Y')}}
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">duration</th>
                    <td width="50%" class="text-right">{{$items->duration}}</td>
                  </tr>
                  <tr>
                    <th width="50%">Type</th>
                    <td width="50%" class="text-right">{{$items->type}}</td>
                  </tr>
                  <tr>
                    <th width="50%">Price</th>
                    <td width="50%" class="text-right">${{$items->price}},00 / person</td>
                  </tr>
                </table>
              </div>
              <div class="join-container">
                @auth
                <form action="{{route('checkout_process', $items->id)}}" method="post">
                    @csrf
                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">Join Now</button>
                </form>
                @endauth
                @guest
                <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">Login Or Register</a>
                @endguest
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection

@push('prepent-style')
 <!-- xzoom -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/libraries/xzoom/dist/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/dist/xzoom.min.js')}}"></script>
    <script>
      // jika documnet ready mana ..
      $(document).ready(function() {
        // mengambil xzoom library
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          Xoffset: 15
        });
      });
    </script>
@endpush