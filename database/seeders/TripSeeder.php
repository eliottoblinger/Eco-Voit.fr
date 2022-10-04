<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = Trip::factory()->count(15)->create();
        $trips->each(function (Trip $t) {
            User::find(1)->trips()->attach($t->id, [
                'qr_code_url' => '',
                'is_driver' => true,
                'opinion' => "Unified padding values for alerts, breadcrumbs, cards, dropdowns, list groups, modals, popovers, and tooltips to be based on our variable. See #30564.",
                'rating' => rand(1,5)
            ]);
        });
    }
}
