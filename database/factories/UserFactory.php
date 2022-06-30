<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName('male'|'female'),
            'lname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
            'password' => Hash::make('admin123!'),
            'age' => $this->faker->numberBetween($min = 18, $max = 35),
        ];
    }
}
