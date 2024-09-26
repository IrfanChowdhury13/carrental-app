@extends('layouts.frontend.app')

@section('content')
    <div class="container py-4">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="bg-secondary rounded p-5">
                    <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4>


                    <form action="{{ route('rentals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="name" readonly
                                        value="{{ $car->name }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="daily_rent_price" readonly
                                        value="{{ $car->daily_rent_price }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                        <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                                    </div>
                                    <input class="form-control" type="date" name="start_date"
                                        value="{{ old('start_date') }}" required>
                                    <input class="form-control" type="time" name="start_time"
                                        value="{{ old('start_time') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                        <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                                    </div>
                                    <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="availability"
                                        value="{{ $car->availability == true ? 'Available' : 'Not Available' }}" readonly>
                                </div>
                            </div>
                            @if ($errors->has('start_date') || $errors->has('end_date'))
                                <span class="text-danger">
                                    <p>Please enter a Valid date.</p>
                                </span>
                            @endif
                            @if ($car->availability == true)
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light w-100 py-2">Book
                                        Now</button>
                                </div>
                            @else
                                <p class="text-danger">This Car Is Not Available</p>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
