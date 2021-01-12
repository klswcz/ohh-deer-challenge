<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'email' => 'recruitment_task@ohhdeer.com',
        ], [
            'name' => 'Test User',
            'password' => Hash::make('_B8bCM3q7kLvaHYK9q_g9jsif4dmgz')
        ]);
    }
}
