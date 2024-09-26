@extends('layouts.backend.app')


@push('styles')
    <style>
        .rental-details-container {
            margin-top: 50px;
        }

        .rental-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .rental-info .form-group {
            margin-bottom: 20px;
        }
    </style>
@endpush


@section('content')
    <div class="container rental-details-container">
        <!-- Header -->
        <div class="rental-header">
            <h2>Rental Details</h2>
        </div>

        <!-- Rental Details Card -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="rental-info">
                    <!-- Rental ID -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Rental ID:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->id }}</p>
                        </div>
                    </div>

                    <!-- Customer Name -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Customer Name:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->user->name }}</p>
                        </div>
                    </div>

                    <!-- Car Details -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Car Details:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->car->car_type }}, <strong>{{ $rental->car->name }}</strong>, {{ $rental->car->model }} </p>
                        </div>
                    </div>

                    <!-- Rental Start Date -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Rental Start Date:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->start_date }}</p>
                        </div>
                    </div>

                    <!-- Rental End Date -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Rental End Date:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->end_date }}</p>
                        </div>
                    </div>

                    <!-- Total Cost -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Total Cost:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->total_cost }}</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Status:</strong></label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $rental->status }}</p>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="text-center">
                    <a href="{{ route('admin.rentals.index') }}" class="btn btn-secondary mt-4">Back to Rental List</a>
                </div>
            </div>
        </div>

    </div>
@endsection
