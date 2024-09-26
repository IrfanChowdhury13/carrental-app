@extends('layouts.backend.app')

@push('styles')
<style>
    .edit-rental-container {
      margin-top: 50px;
    }
    .edit-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
    }
  </style>
@endpush




@section('content')

    <div class="container edit-rental-container">
        <!-- Header -->
        <div class="edit-header">
            <h2>Edit Rental</h2>
        </div>

        <!-- Edit Rental Form -->
        <div class="card mt-4">
            <div class="card-body">


                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif


                <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- Rental ID (Read-only) -->
                    <div class="form-group">
                        <label for="rentalId">Rental ID</label>
                        <input type="text" class="form-control" id="rentalId" name="id" value="{{ $rental->id }}" readonly>
                    </div>

                    <!-- Customer Name -->
                    <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" id="customerName" name="name" value="{{ $rental->user->name }}"
                        readonly>
                    </div>

                    <!-- Car Model -->
                    <div class="form-group">
                        <label for="carModel">Car Model</label>
                        <input type="text" class="form-control" id="carModel" name="model" value="{{ $rental->car->model }}"
                        readonly>
                    </div>

                    <!-- Rental Start Date -->
                    <div class="form-group">
                        <label for="rentalStartDate">Rental Start Date</label>
                        <input type="text" class="form-control" id="rentalStartDate" name="start_date"
                            value="{{ $rental->start_date->format('d M Y')  }}" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="rentalStartDate">Rental Start Time</label>
                        <input type="text" class="form-control" id="rentalStartDate" name="start_time"
                            value="{{ $rental->start_time->format('g:i a')}}" readonly>
                    </div>

                    <!-- Rental End Date -->
                    <div class="form-group">
                        <label for="rentalEndDate">Rental End Date</label>
                        <input type="text" class="form-control" id="rentalEndDate" name="end_date"
                            value="{{ $rental->end_date->format('d M Y')  }}" readonly>
                    </div>

                    <!-- Total Cost -->
                    <div class="form-group">
                        <label for="totalCost">Total Cost</label>
                        <input type="number" class="form-control" id="totalCost" name="total_cost" value="{{ $rental->total_cost }}" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="ongoing" selected>Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success btn-block">Update Rental</button>
                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.rentals.index') }}" class="btn btn-secondary">Back to Rental List</a>
        </div>

    </div>

@endsection
