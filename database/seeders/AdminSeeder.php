<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run() {
        Admin::create([
            'name' => 'Mohammad Raka Saputra',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'address' => 'Sidoarjo',
            'birth_place' => 'Sidoarjo',
            'birth_date' => '2005-04-07'
        ]);
    }
}
