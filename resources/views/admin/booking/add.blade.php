@extends('_templates/base')

@section('content')
<div class="card card-body">
    <h1>Bookings</h1>
    <hr>

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="customer" class="form-label">Customer</label>
            <input type="text" name="customer" class="form-control" id="customer">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" id="phone">
        </div>

        <div class="mb-3">
            <label for="begin_date" class="form-label">Begin Date</label>
            <input type="datetime-local" name="begin_date" class="form-control" id="begin_date">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="datetime-local" name="end_date" class="form-control" id="end_date">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Accepted</option>
                <option value="0">Refused</option>
            </select>
        </div>

        <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Add
        </button>
    </form>
</div>
@endsection
