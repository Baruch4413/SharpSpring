<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        User::firstOrCreate([
            'email' => 'test@test.com',
        ],[
            'name' => 'Test',
            'password' => Hash::make('$sh4rpspr1nG$')
        ]);
    }

}
