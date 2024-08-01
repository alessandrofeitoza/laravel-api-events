@extends('_templates.base')

@section('content')
    <div class="card card-body">
        <div class="d-flex justify-content-between">
            <h1>Reservas</h1>
            <div>
                <a class="btn btn-outline-primary" href="/admin/reservas/add">
                    Nova Reserva
                </a>
            </div>
        </div>
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
                            <button class="btn btn-sm btn-outline-warning">Editar</button>
                            <button class="btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
