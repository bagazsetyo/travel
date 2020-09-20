@extends('layouts.admin')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
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
            <form action="{{route('travel-package.store')}}" method="post"> 
                @csrf
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" 
                            name="title" 
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="title" 
                            value="{{old('title')}}">
                            @error('title')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" 
                            name="location" 
                            class="form-control @error('location') is-invalid @enderror" 
                            placeholder="location" 
                            value="{{old('location')}}">
                            @error('location')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="about">about</label>
                    <textarea name="about" rows="10" class="d-block w-100 form-control @error('about') is-invalid @enderror">
                        {{old('about')}}
                    </textarea>@error('about')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="feature_evet">feature_evet</label>
                    <input type="text" 
                            name="feature_evet" 
                            class="form-control @error('feature_evet') is-invalid @enderror" 
                            placeholder="feature_evet" 
                            value="{{old('feature_evet')}}">
                            @error('feature_evet')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="language">language</label>
                    <input type="text" 
                            name="language" 
                            class="form-control @error('language') is-invalid @enderror" 
                            placeholder="language" 
                            value="{{old('language')}}">
                            @error('language')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="food">food</label>
                    <input type="text" 
                            name="food" 
                            class="form-control @error('food') is-invalid @enderror" 
                            placeholder="food" 
                            value="{{old('food')}}">
                            @error('food')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="departure_date">departure_date</label>
                    <input type="date" 
                            name="departure_date" 
                            class="form-control @error('departure_date') is-invalid @enderror" 
                            placeholder="departure_date" 
                            value="{{old('departure_date')}}">
                            @error('departure_date')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="duration">duration</label>
                    <input type="text" 
                            name="duration" 
                            class="form-control @error('duration') is-invalid @enderror" 
                            placeholder="duration" 
                            value="{{old('duration')}}">
                            @error('duration')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="type">type</label>
                    <input type="text" 
                            name="type" 
                            class="form-control @error('type') is-invalid @enderror" 
                            placeholder="type" 
                            value="{{old('type')}}">
                            @error('type')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="number" 
                            name="price" 
                            class="form-control @error('price') is-invalid @enderror" 
                            placeholder="price" 
                            value="{{old('price')}}">
                            @error('price')<div class="text-muted">{{ $message }}</div> @enderror
                </div>
                 <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit">tes</button>
            </form>
        </div>
    </div>
    </div>
  </div>


</div>
@endsection