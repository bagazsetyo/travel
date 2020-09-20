@extends('layouts.admin')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
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
            <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label for="travel_packages_id">id</label>
                    <select class="form-control" name="travel_packages_id" required>
                        @foreach($items as $items)
                            <option value="{{$items->id}}">{{$items->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" 
                            name="image" 
                            class="form-control @error('image') is-invalid @enderror" 
                            placeholder="image" 
                            value="{{old('image')}}">
                            @error('image')<div class="text-muted">{{ $message }}</div> @enderror
                 <button class="btn btn-primary btn-block mt-3" type="submit" name="submit" value="submit">submit</button>
            </form>
        </div>
    </div>
    </div>
  </div>


</div>
@endsection