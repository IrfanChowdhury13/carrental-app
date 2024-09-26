@extends('layouts.backend.app')

@push('styles')
    <style>
        .details-container {
            margin-top: 30px;
        }

        .details-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .details-card {
            margin-top: 20px;
        }

        .rental-history {
            margin-top: 20px;
        }

        .rental-history th,
        .rental-history td {
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="container details-container pt-5">
        <!-- Header -->
        <div class="details-header">
            <h2>Customer Details</h2>
        </div>

        <!-- Customer Information Card -->
        <div class="card details-card">
            <div class="card-body">
                <h4 class="card-title"><strong>Customer Name: </strong>{{ $customer->name }}</h4>
                <p class="card-text">
                    <strong>Email:</strong> {{ $customer->email }}<br>
                    <strong>Phone Number:</strong> {{ $customer->phone }}<br>
                    <strong>Address:</strong> {{ $customer->address }}
                </p>
            </div>
        </div>

        <!-- Rental History Table -->
        <div class="card rental-history">
            <div class="card-header bg-secondary text-white">
                <h5>Rental History</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Rental ID</th>
                            <th>Car</th>
                            <th>Rental Date</th>
                            <th>Return Date</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#101</td>
                            <td>Toyota Camry</td>
                            <td>2023-08-15</td>
                            <td>2023-08-18</td>
                            <td>$200</td>
                        </tr>
                        <tr>
                            <td>#102</td>
                            <td>Honda Civic</td>
                            <td>2023-09-05</td>
                            <td>2023-09-10</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td>#103</td>
                            <td>Ford Mustang</td>
                            <td>2023-09-15</td>
                            <td>2023-09-20</td>
                            <td>$300</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Back to Customers</a>
        </div>

    </div>
@endsection
