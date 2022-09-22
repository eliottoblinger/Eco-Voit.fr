<?php

namespace Tests\Feature;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TripTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGoToAddTripPage()
    {
        $response = $this->get('/add-trip');

        if(Auth::check()){
            $response->assertStatus(200);
        }else{
            $response->assertStatus(302);
        }
    }

    public function testGoToUserTripsPage()
    {
        $response = $this->get('/my-trips');

        if(Auth::check()){
            $response->assertStatus(200);
        }else{
            $response->assertStatus(302);
        }
    }

    public function testTripsTableFields(){
        $trips = Trip::factory()->count(30)->create();

        foreach($trips as $trip){
            $this->assertIsString($trip->departure_city);
            $this->assertIsString($trip->departure_zip_code);
            $this->assertIsString($trip->departure_address);
            $this->assertIsString($trip->arrival_city);
            $this->assertIsString($trip->arrival_zip_code);
            $this->assertIsString($trip->arrival_address);
            $this->assertIsInt($trip->duration);
            $this->assertIsInt($trip->meters);
            $this->assertIsInt($trip->price);
            $this->assertIsInt($trip->number_of_seats);
            $this->assertIsString($trip->unique_key);
        }
    }

    public function testUserTripTableFields(){
        $trips = Trip::factory()->count(30)->create();

        $user = User::factory()->create();

        foreach($trips as $trip){
            $user->trips()->attach($trip->id, [
                'qr_code_url' => '',
                'is_driver' => true
            ]);
        }

        foreach($user->trips as $trip){
            $this->assertNull($trip->pivot->rating);
            $this->assertNull($trip->pivot->opinion);
            $this->assertEquals('', $trip->pivot->qr_code_url);
            $this->assertEquals(1, $trip->pivot->is_driver);
            $this->assertEquals($user->id, $trip->pivot->user_id);
            $this->assertEquals($trip->id, $trip->pivot->trip_id);
        }
    }
}
