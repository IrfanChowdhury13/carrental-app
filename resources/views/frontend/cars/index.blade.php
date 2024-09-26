@extends('layouts.frontend.app')

@section('content')
    <div class="container" style="padding: 100px 0px">

        <form method="GET" action="{{ route('cars.index') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <label for="car_type">Car Type</label>
                    <select name="car_type" class="form-control" id="car_type">
                        <option value="">Select Car Type</option>
                        @foreach ($carTypes as $type)
                            <option value="{{ $type }}"{{ request('car_type') == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="brand">Select Brand</label>
                    <select name="brand" class="form-control" id="brand">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand }} {{ request('brand') == $brand ? 'selected' : '' }}">
                                {{ $brand }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>


        </form>

        <div class="row mt-5">
            @foreach ($cars as $car)
                <div class="col-md-4 categories-item p-4 border-none">
                    <div class="categories-item-inner">
                        <div class="categories-img rounded-top">
                            <img src="{{ asset('uploads/' . $car->image) }}" class="img-fluid w-100 rounded-top"
                                alt="">
                        </div>
                        <div class="categories-content rounded-bottom p-4">
                            <h4>{{ $car->name }}</h4>
                            
                            <div class="mb-4">
                                <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">
                                    {{ $car->daily_rent_price }}/Day</h4>
                            </div>
                            <div class="row gy-2 gx-0 text-center mb-4">
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-users text-dark"></i> <span class="text-body ms-1">4 Seat</span>
                                </div>
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-car text-dark"></i> <span class="text-body ms-1">AT/MT</span>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-gas-pump text-dark"></i> <span class="text-body ms-1">Petrol</span>
                                </div>
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-car text-dark"></i> <span
                                        class="text-body ms-1">{{ $car->year }}</span>
                                </div>
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-cogs text-dark"></i> <span class="text-body ms-1">AUTO</span>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-road text-dark"></i> <span class="text-body ms-1">27K</span>
                                </div>
                            </div>

                            @if ($car->availability == true)
                                <a href="{{ route('customer.bookingform', $car->id) }}"
                                    class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book Now</a>
                            @else
                                <p class="text-danger">This Car Is Not Available</p>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
