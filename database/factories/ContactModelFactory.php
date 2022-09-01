<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ContactModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ContactModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::inRandomOrder()->first();
//        dd($userId);
        $exists = ContactModel::where('user_id', $userId->id)->first();
//                dd($exists);
        if ($exists) {

            $userId = User::inRandomOrder()->first();
//            dd($userId);
        }
        return [
            'user_id' => $userId->id,
            'user_number' => rand('1111111111', '9999999999'),
            'status' => rand('0', '1'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [

            ];
        });
    }
}
