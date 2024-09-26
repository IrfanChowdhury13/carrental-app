@extends('layouts.backend.app')
@push('styles')
    <style>
        .customer-list-container {
            margin-top: 50px;
        }

        .customer-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    <div class="customer-list-container">
        <div class="customer-header">
            <h2>Customer List</h2>
        </div>
        <div class="card">
           
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.show', $customer->id) }}"
                                        class="btn btn-success">View</a>
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                        class="btn btn-primary ms-1">Edit</a>

                                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
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

                {{ $customers->links() }}

            </div>

            <!-- /.card-body -->
        </div>
    </div>
@endsection
