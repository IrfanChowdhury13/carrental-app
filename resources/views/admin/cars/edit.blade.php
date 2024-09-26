@extends('layouts.backend.app')

@push('styles')
<style>
    .edit-car-container {
      margin-top: 50px;
    }
    .edit-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .form-group img {
      max-width: 150px;
      height: auto;
      object-fit: cover;
      margin-bottom: 10px;
    }
  </style>
@endpush

@section('content')

<div class="container edit-car-container">
    <!-- Header -->
    <div class="edit-header">
      <h2>Edit Car Details</h2>
    </div>

    <!-- Edit Car Form -->
    <div class="card mt-4">
      <div class="card-body">
        @if ($errors->any())    
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif



        <form action="{{ route('admin.cars.update', $cars->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          <!-- Car Name -->
          <div class="form-group">
            <label for="carName">Car Name</label>
            <input type="text" class="form-control" id="carName" name="name" placeholder="Enter Car Name" value="{{ $cars->name }}" required>
          </div>

          <!-- Brand -->
          <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ $cars->brand }}" required>
          </div>

          <!-- Model -->
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $cars->model }}" required>
          </div>

          <!-- Year of Manufacture -->
          <div class="form-group">
            <label for="year">Year of Manufacture</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $cars->year }}" required>
          </div>

          <!-- Car Type -->
          <div class="form-group">
            <label for="carType">Car Type</label>
            <select class="form-control" id="carType" name="car_type" required>
              <option value="SUV">SUV</option>
              <option value="Sedan" selected>Sedan</option>
              <option value="Hatchback">Hatchback</option>
              <option value="Truck">Truck</option>
              <option value="Convertible">Convertible</option>
            </select>
          </div>

          <!-- Daily Rent Price -->
          <div class="form-group">
            <label for="price">Daily Rent Price</label>
            <input type="number" class="form-control" id="price" name="daily_rent_price" value="{{ $cars->daily_rent_price }}" required>
          </div>

          <!-- Availability Status -->
          <div class="form-group">
            <label for="availability">Availability Status</label>
            <select class="form-control" id="availability" name="availability" required>
              <option value="1" {{ $cars->availability == 1 ? 'selected' : '' }}>Available</option>
              <option value="0" {{ $cars->availability == 0 ? 'selected' : '' }}>Not Available</option>
            </select>
          </div>

          <!-- Current Car Image -->

          @if (isset($cars->image))
          <div class="form-group">
            <label>Current Car Image</label><br>
            <img src="{{ asset('uploads/' . $cars->image) }}" alt="Current Car Image" class="img-thumbnail">
          </div>
          @endif
          
          

          <!-- New Car Image -->
          <div class="form-group">
            <label for="carImage">Upload New Image (optional)</label>
            <input type="file" class="form-control-file" id="carImage" name="image">
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-success btn-block">Update Car</button>
        </form>
      </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4 text-center">
      <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Back to Car List</a>
    </div>

  </div>
@endsection