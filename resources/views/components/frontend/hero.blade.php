<div>
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('frontend/assets/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="First slide" />
                <div class="carousel-caption">
                    <div class="container py-4">
                        <div class="row g-5">
                            <div class="col-lg-6 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s"
                                style="animation-delay: 1s;">
                                <div class="bg-secondary rounded p-5">
                                    <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4>


                                    <form action="{{ route('rentals.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row g-3">
                                            <div class="col-12">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="car_id">
                                                    <option selected>Select Your Car</option>
                                                    @foreach (\App\Models\Car::getForSelect() as $car)
                                                        <option value="{{ $car->id }}">{{ $car->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div
                                                        class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                        <span class="fas fa-calendar-alt"></span><span
                                                            class="ms-1">Pick Up</span>
                                                    </div>
                                                    <input class="form-control" type="date" name="start_date"
                                                        value="{{ old('start_date') }}" required>
                                                    <input class="form-control" type="time" name="start_time"
                                                        value="{{ old('start_time') }}" required>
                                                    {{-- <select class="form-select ms-3" aria-label="Default select example" name="start_time">
                                                      <option selected>12:00AM</option>
                                                      <option value="1">1:00AM</option>
                                                      <option value="2">2:00AM</option>
                                                      <option value="3">3:00AM</option>
                                                      <option value="4">4:00AM</option>
                                                      <option value="5">5:00AM</option>
                                                      <option value="6">6:00AM</option>
                                                      <option value="7">7:00AM</option>
                                                  </select> --}}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div
                                                        class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                        <span class="fas fa-calendar-alt"></span><span
                                                            class="ms-1">Drop off</span>
                                                    </div>
                                                    <input class="form-control" type="date" name="end_date"
                                                        value="{{ old('end_date') }}" required>
                                                    {{-- <select class="form-select ms-3" aria-label="Default select example">
                                                      <option selected>12:00AM</option>
                                                      <option value="1">1:00AM</option>
                                                      <option value="2">2:00AM</option>
                                                      <option value="3">3:00AM</option>
                                                      <option value="4">4:00AM</option>
                                                      <option value="5">5:00AM</option>
                                                      <option value="6">6:00AM</option>
                                                      <option value="7">7:00AM</option>
                                                  </select> --}}
                                                </div>
                                            </div>
                                            @if ($errors->has('start_date') || $errors->has('end_date') )
                                                <span class="text-danger">
                                                    <p>Please enter a Valid date.</p>
                                                </span>
                                            @endif
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-light w-100 py-2">Book
                                                    Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight"
                                data-delay="1s" style="animation-delay: 1s;">
                                <div class="text-start">
                                    <h1 class="display-5 text-white">Get 15% off your rental Plan your trip now</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
