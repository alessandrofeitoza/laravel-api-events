<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    private const VALUES = [
        [
            'customer' => 'Mariazinha',
            'email' => 'maria@email.com',
            'phone' => '558512345679',
            'begin_date' => '2024-07-18 18:00:00',
            'end_date' => '2024-07-18 22:00:00',
            'status' => true,
        ],
        [
            'customer' => 'Josefina',
            'email' => 'josefina@email.com',
            'phone' => '558512345679',
            'begin_date' => '2024-07-19 07:00:00',
            'end_date' => '2024-07-19 10:00:00',
            'status' => false,
        ],
        
    ];

    public function run(): void
    {
        foreach (self::VALUES as $item) {
            $booking = new Booking();
            $booking->fill($item);
            $booking->saveOrFail();
        }
    }
}
