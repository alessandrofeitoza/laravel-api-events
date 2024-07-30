<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class BookingTest extends TestCase
{
    public function test_get_all_bookings(): void
    {
        $response = $this->get('/api/bookings');
        $content = json_decode($response->getContent(), true);

        $this->assertEquals('Mariazinha', $content[0]['customer']);
        
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'customer',
                'email',
                'phone',
                'begin_date',
                'end_date',
                'status',
            ],
        ]);
    }
}
