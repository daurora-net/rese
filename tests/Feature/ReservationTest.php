<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reservation;

class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');
    //     $response->assertStatus(302);
    // }
    public function test_reservation_screen_can_be_rendered()
    {
        $response = $this->get('/detail/{id}');
        $response->assertStatus(200);
    }

    public function test_users_can_new_reservation()
    {
        $response = $this->post('/detail/{id}', [
            'user_id' => '1',
            'shop_id' => '1',
            'started_at' => '20231122',
            'num_of_users' => '1',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/reserve/done');
    }
}
