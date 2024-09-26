@extends('layouts.backend.app')

@push('styles')
    <style>
        .rental-list-container {
            margin-top: 50px;
        }

        .rental-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
@endpush


@section('content')
    <div class="rental-list-container">
        <!-- Header -->
        <div class="rental-header">
            <h2>Rental List</h2>
        </div>

        <!-- Rental List Table -->
        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            {{-- <th>SL</th> --}}
                            <th>Rental ID</th>
                            <th>Customer Name</th>
                            <th>Car Model</th>
                            <th>Rental Start Date</th>
                            <th>Rental Start Time</th>
                            <th>Rental End Date</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($rentals as $rental)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->user->name }}</td>
                                <td>{{ $rental->car->model }}</td>
                                <td>{{ $rental->start_date->format('d M Y') }}</td>
                                <td>{{ $rental->start_time->format('g:i a') }}</td>
                                <td>{{ $rental->end_date->format('d M Y') }}</td>
                                <td>{{ $rental->total_cost }}</td>
                                <td>{{ $rental->status }}</td>
                                <td>
                                    <a href="{{ route('admin.rentals.show', $rental->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.rentals.edit', $rental->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST"
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
                    {{ $rentals->links() }}
                </table>
            </div>
        </div>

    </div>
@endsection
