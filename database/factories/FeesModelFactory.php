<?php

namespace Database\Factories;

use App\Models\ContactModel;
use App\Models\FeesModel;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class FeesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = User::inRandomOrder()->first();
        $exists = FeesModel::where('user_id', $userId->id)->first();
//        dd($exists);
        if ($exists) {
            $userId = User::inRandomOrder()->first();
        }
        return [
            'user_id' => $userId->id,
            'price' => rand('10000','99999'),
            'status' => rand('0','1'),
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
