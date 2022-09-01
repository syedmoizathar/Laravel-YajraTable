<?php

namespace Database\Seeders;

use App\Models\ContactModel;
use App\Models\FeesModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $exists = User::where('email', 'moizathar90@gmail.com')->first();
        if (!$exists) {
            $user = User::create([
                'name' => 'moiz athar',
                'email' => 'moizathar90@gmail.com',
                'password' => Hash::make('moiz athar'),
                'status' => 1,
            ]);

            ContactModel::create([
                'user_id' => $user->id,
                'user_number' => '03362123115',
                'status' => rand('0', '1'),
            ]);
            FeesModel::create([
                'user_id' => $user->id,
                'price' => rand('10000', '99999'),
                'status' => rand('0', '1'),
            ]);
        }
        \App\Models\User::factory(20)->create();
        \App\Models\ContactModel::factory(10)->create();
        \App\Models\FeesModel::factory(10)->create();
    }
}
