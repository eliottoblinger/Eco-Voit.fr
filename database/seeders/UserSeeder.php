<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = 'User57000!';

        $names = ['Chikhi', 'Oblinger', 'Doe'];
        $surnames = ['Fayçal', 'Eliott', 'John'];
        $emails = ['faycal@gmail.com', 'eliott@flippad.com', 'john@gmail.com'];
        $passwords = [$pass, $pass, $pass];
        $roles = [2, 2, 1];

        foreach($names as $key => $name){
            DB::table('users')->insert([
                'name' => $name,
                'surname' => $surnames[$key],
                'email' => $emails[$key],
                'birth_date' => Carbon::parse('first day of December 2001'),
                'password' => Hash::make($passwords[$key]),
                'role_id' => $roles[$key],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
