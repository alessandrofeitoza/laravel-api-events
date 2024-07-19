<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Booking;

class BookingRepository
{
    public function findAll(): iterable
    {
        return Booking::all();
    }

    public function remove(int $id): void
    {
        Booking::destroy($id);
    }
}
