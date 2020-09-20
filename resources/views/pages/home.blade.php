@extends('layouts.app')

@section('title')
    nomads
@endsection

@section('content')
	
 <!-- header  -->
    <header class="text-center">
      <h1>
        Explore the beautyful world
        <br>
        As Easy one click
      </h1>
      <p class="mt-3">
        you will see beautifull
        <br>
        moment you never see before
      </p>
      <a href="#" class="btn btn-get-started mx-4 mt-4">Get Started</a>
    </header>

    <!-- main -->
    <main>
      <div class="container">
        <div class="section-stats row justify-content-center" id="stats">
          <div class="col-3 col-md-2 stats-detail">
            <h2>20K</h2>
            <p>members</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>12K</h2>
            <p>countries</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>hotels</p>
          </div>
          <div class="col-3 col-md-2 stats-detail">
            <h2>72</h2>
            <p>partners</p>
          </div>
        </div>
      </div>
      <section class="section-popular" id="popular">
        <div class="container">
          <div class="row">
            <div class="col text-center section-popular-heading">
              <h2>
                wisata popular
              </h2>
              <p>
                Something that you never try
                <br>
                before in this world
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="section-popular-content" id="popularcontent">
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            @foreach($items as $items)
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="card-travel text-center d-flex flex-column" 
                                        {{-- konditional if dengan tenary function --}}
                        style="background-image: url('{{$items->galleries->count() ? Storage::url($items->galleries->first()->image) : '' }}');">
                    <div class="travel-country text-capitalize">{{$items->location}}</div>
                    <div class="travel-location text-capitalize">{{$items->title}}</div>
                    <div class="travel-button mt-auto">
                            {{-- mennggunakan slug untuk menggantikan id --}}
                            {{-- di route juga harus di ganti --}}
                      <a href="{{route('detail',$items->slug)}}" class="btn btn-travel-details px-4">view detils</a>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </section>
      <section class="section-networks" id="networks">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h2>Our Network</h2>
              <p>
                Companies are trusted us
                <br>
                more that just a trip
              </p>
            </div>
            <div class="col-md-8 text-center">
              <img src="frontend/images/logo_assets/logo_assets/ana.png" alt="" class="logo-partner" width="100px">
              <img src="frontend/images/logo_assets/logo_assets/disney.png" alt="" class="logo-partner" width="100px">
              <img src="frontend/images/logo_assets/logo_assets/shangri-la.png" alt="" class="logo-partner" width="100px">
              <img src="frontend/images/logo_assets/logo_assets/visa.png" alt="" class="logo-partner" width="100px">
            </div>
          </div>
        </div>
      </section>

      <!-- testimonial header -->
      <section class="section-testimonial-heading" id="testimonialheading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>They Are loving us</h2>
              <p>
                moments were giwing them
                <br>
                the best experience
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- testimonial content -->
      <section class="section-testimonial-content" id="testimonila-content">
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png" alt="user" class="mb-4 rounded-circle" width="120px;">
                  <h3 class="mb-4">
                    Angga risky
                  </h3>
                  <p class="testimonial">
                    "it was glorius and i could <br>
                    not stop to say wohooo for <br>
                    every single moment <br>
                    Dankeeee"
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  trip to uhud
                </p>
              </div>
            </div>
             <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png" alt="user" class="mb-4 rounded-circle" width="120px;">
                  <h3 class="mb-4">
                    Angga risky
                  </h3>
                  <p class="testimonial">
                    "it was glorius and i could <br>
                    not stop to say wohooo for <br>
                    every single moment <br>
                    Dankeeee"
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  trip to uhud
                </p>
              </div>
            </div>
             <div class="col-sm-6 col-md-6 col-lg-4">
              <div class="card card-testimonial text-center">
                <div class="testimonial-content">
                  <img src="frontend/images/picture-20200824T044509Z-001/picture/anggaphoto.png" alt="user" class="mb-4 rounded-circle" width="120px;">
                  <h3 class="mb-4">
                    Angga risky
                  </h3>
                  <p class="testimonial">
                    "it was glorius and i could <br>
                    not stop to say wohooo for <br>
                    every single moment <br>
                    Dankeeee"
                  </p>
                </div>
                <hr>
                <p class="trip-to mt-2">
                  trip to uhud
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <a href="" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
              <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
            </div>
          </div>
        </div>
      </section>
    </main>

@endsection