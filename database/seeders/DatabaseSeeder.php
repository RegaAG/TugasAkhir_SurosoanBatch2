<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::insert([
            'name' => 'Joni',
            'username' => 'joni',
            'password' => Hash::make('leader'),
            'created_at' => Carbon::now(),
            'roles' => 'admin'
        ]);

        User::insert([
            'name' => 'Putri',
            'username' => 'putri',
            'password' => Hash::make('staff'),
            'created_at' => Carbon::now(),
            'roles' => 'staff'
        ]);
    }
}
