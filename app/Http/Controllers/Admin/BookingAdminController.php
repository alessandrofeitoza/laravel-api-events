<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\JsonResponse\NotFoundJsonResponse;
use Illuminate\Http\Request;
use Exception;
use App\Models\Booking;

class BookingAdminController extends Controller
{
    public function list(): mixed
    {
        $bookings = Booking::all();
        
        return view('booking/list', [
            'bookings' => $bookings,
        ]);
    }

    public function getOne(string $id): JsonResponse
    {
        try {
            $booking = Booking::findOrFail($id);
            return new JsonResponse($booking);
        } catch (Exception) {
            return new NotFoundJsonResponse();
        }
    }

    public function store(): mixed
    {
        
    }

    public function update(string $id, Request $request): mixed
    {
        try {
            if (empty($id)) {
                return new JsonResponse([
                    'message' => 'Booking not found',
                ], 404);
            }
            $booking = Booking::findOrFail($id);
            $booking->update($request->all());

            return new JsonResponse([
                'message' => 'Booking updated successfully',
                'booking' => $booking,
            ]);
        } catch (Exception) {
            return new JsonResponse([
                'message' => 'Failed to update booking',
            ], 500);
        }
    }
}

