<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Anas Sharaf',
            'email'=> 'anassharuf@gmail.com',
            'password'=> Hash::make('123456789'),
            'job_title_id'=>1
        ]);

    }
}
