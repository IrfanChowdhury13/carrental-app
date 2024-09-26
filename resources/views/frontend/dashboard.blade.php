@extends('layouts.frontend.app')

@section('content')
    <main>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S.L</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Rent Cost</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Rental Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($rentals as $rental)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td> {{ $rental->car->model }} </td>
                            <td>{{ $rental->total_cost }}</td>
                            <td>{{ $rental->start_date->format('d M Y') }}</td>
                            <td>{{ $rental->start_time->format('g:i a') }}</td>
                            <td>{{ $rental->end_date->format('d M Y') }}</td>
                            <td>{{ $rental->status }}</td>
                            <td>
                                <form action="{{ route('rentals.cancel', $rental->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')

                                    @if ($rental->status == 'ongoing')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure, you want to cancel this?')"
                                            class="btn btn-danger ms-1">Cancel
                                        </button>
                                    @else 
                                    <p>Not Applicable</p>
                                    
                                    @endif

                                   

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
        </div>
    </main>
@endsection
