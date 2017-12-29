<?php

use Illuminate\Database\Seeder;
use App\Chef;

class ChefsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chef::create([
            'name' => 'Hershey',
            'city' => 'Amsterdam',
            'available' => 1,
            'contact_info' => 'instagram: Hershey'
        ]);
    }
}
