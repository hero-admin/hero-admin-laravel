<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

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
	#[ArrayShape([
		'name'              => "string",
		'email'             => "mixed",
		'email_verified_at' => "\Illuminate\Support\Carbon",
		'password'          => "string",
		'remember_token'    => "string",
	])]
	public function definition(): array
	{
		return [
			'name'              => $this->faker->name,
			'email'             => $this->faker->unique()->safeEmail,
			'email_verified_at' => now(),
			'password'          => '123456', // password
			'remember_token'    => Str::random(10),
		];
	}
}
