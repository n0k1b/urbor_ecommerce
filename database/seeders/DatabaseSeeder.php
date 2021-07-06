<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product_required_filed;
use App\Models\user;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        user::create([
            'name'=>'Admin',
            'email'=>'gogoshopbd@gmail.com',
            'contact_no'=>'01815822471',
            'password'=>Hash::make('$1234$')



        ]);


    }
}
