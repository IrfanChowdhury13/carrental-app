@extends('layouts.backend.app')

@push('styles')
<style>
    .car-details-container {
      margin-top: 50px;
    }
    .car-image {
      max-width: 100%;
      height: auto;
    }
    .car-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
    }
  </style>
    
@endpush

@section('content')

<div class="container car-details-container">
    <!-- Header -->
    <div class="car-header">
      <h2>Car Details</h2>
    </div>

    <!-- Car Details Card -->
    <div class="card mt-4">
      <div class="row no-gutters">
        <div class="col-md-6">
          <img src="{{ asset('uploads/' . $car->image) }}" alt="Car Image" class="car-image card-img">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <p class="card-title"> <strong>Car Name: </strong> {{ $car->name }}</p>
            <p class="card-text"><strong>Brand:</strong> {{ $car->brand }}</p>
            <p class="card-text"><strong>Model:</strong> {{ $car->model }}</p>
            <p class="card-text"><strong>Year of Manufacture:</strong> {{ $car->year }}</p>
            <p class="card-text"><strong>Car Type:</strong> {{ $car->car_type }}</p>
            <p class="card-text"><strong>Daily Rent Price:</strong> {{ $car->daily_rent_price }}</p>
            <p class="card-text"><strong>Availability Status:</strong> {{ $car->availability }} </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4 text-center">
      <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary">Back to Car List</a>
    </div>

  </div>

@endsection