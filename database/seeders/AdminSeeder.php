<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run() {
        Admin::create([
        'name' => 'Mohammad Raka Saputra',
        'email' => 'raka2553@gmail.com',
        'password' => Hash::make('7425raka'),
        'address' => 'Sidoarjo',
        'birth_place' => 'Sidoarjo',
        'birth_date' => '2005-04-07'
    ]);
    }
}
