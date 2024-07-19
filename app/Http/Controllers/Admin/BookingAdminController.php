<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingAdminController extends Controller
{
    public function list (): mixed 
    {
        $bookings = Booking::all();
    
        return view('booking/list', [
            'bookings' => $bookings,
        ]);
    } 

    public function store (): mixed 
    {
        return view('admin/booking/add');
    }
}
