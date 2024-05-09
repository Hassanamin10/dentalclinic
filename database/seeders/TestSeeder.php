<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Khaled',
        'email' => 'Khaled398@gmail.com',
        'password' => Hash::make('12345678'),
        'national_id' => '41221123721087',
        ]);
    }

}
