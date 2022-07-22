<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = Trip::factory()->count(30)->create();
        $trips->each(function (Trip $t) {
            User::find(1)->trips()->attach($t->id, [
                'qr_code_url' => '',
                'is_driver' => true
            ]);
        });
    }
}
