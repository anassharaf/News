<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'emp2',
            'email'=> 'emp2@gmail.com',
            'password'=> Hash::make('123456789'),
            'job_title_id'=>3
        ]);

    }
}
