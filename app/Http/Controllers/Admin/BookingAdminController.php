<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\JsonResponse\NotFoundJsonResponse;
use Exception;
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

    public function getOne (string $id ): JsonResponse 
    {
        try {

            $bookings = Booking::findOrFail($id);
            return new JsonResponse($bookings);

        } catch (Exception) {

            return new NotFoundJsonResponse();
        } 
    } 


    public function store (): mixed 
    {
 
    } 
}
