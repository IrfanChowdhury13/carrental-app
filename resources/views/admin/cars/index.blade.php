@extends('layouts.backend.app')

@push('styles')
    <style>
        .car-list-container {
            margin-top: 50px;
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
    <div class="car-list-container">
        <div class="car-header">
            <h2>Car List</h2>
        </div>
        <div class="card">
            
            <div class="card-body">

                <table class="table table-bordered table-striped mb-2">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Car Type</th>
                            <th>Daily Rent Price</th>
                            <th>Availability Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($cars as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/' . $car->image) }}" alt="" width="90">
                                </td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->car_type }}</td>
                                <td>{{ $car->daily_rent_price }}</td>
                                <td>{{ $car->availability == true ? 'Available' : 'Not Available' }}</td>

                                <td>
                                    <a href="{{ route('admin.cars.show', $car->id) }}" class="btn btn-success">View</a>
                                    <a href="{{ route('admin.cars.edit', $car->id) }}"
                                        class="btn btn-primary ms-1">Edit</a>



                                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure, you want to delete this?')"
                                            class="btn btn-danger ms-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="9">
                                    No Data Found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

                {{ $cars->links() }}

            </div>

            <!-- /.card-body -->
        </div>
    </div>
@endsection


@push('scripts')
@endpush
