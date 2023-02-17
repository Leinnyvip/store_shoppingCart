<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
			'number_id' => $this->faker->unique()->randomNumber(1 - 9, true),
			'name' => $this->faker->name(),
			'last_name' => $this->faker->lastname(),
			'email' => $this->faker->unique()->safeEmail(),
			'password' => bcrypt(123456789), // password
            'phone' => $this->faker->e164PhoneNumber(1 - 9, true),
            'address' => $this->faker->address()
		];
    }

}
