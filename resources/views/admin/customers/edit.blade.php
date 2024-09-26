@extends('layouts.backend.app')


@push('styles')
    <style>
        .profile-container {
            margin-top: 50px;
        }

        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .profile-card {
            margin-top: 20px;
            padding: 20px;
        }

        .form-control {
            margin-bottom: 15px;
        }
    </style>
@endpush



@section('content')

    <div class="container profile-container">
        <!-- Header -->
        <div class="profile-header">
            <h2>Update Profile</h2>
        </div>

        <!-- Profile Update Form -->
        <div class="card profile-card">

            <div class="card-body">
                @if ($errors->any())    
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
                <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter your full name" value="{{ $customer->name }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email" value="{{ $customer->email }}" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter your phone number" value="{{ $customer->phone }}" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter your address" value="{{ $customer->address }}">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Update Profile</button>

                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back to Customers</a>
        </div>

    </div>
@endsection
