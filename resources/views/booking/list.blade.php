@extends('_templates/base')

@section('content')
    <div class="card card-body">
        <h1>Bookings</h1>
        <hr>
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Begin Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking) 
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->customer }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->begin_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            <button class="btn btn-outline-warning">Editar</button>
                            <button class="btn btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection