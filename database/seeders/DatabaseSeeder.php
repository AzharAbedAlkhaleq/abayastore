<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Coupon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Super Admin',
            'email'=>'admin@abaya.com',
            'mobile'=>'0123456789',
            'password'=>bcrypt('secret')
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
