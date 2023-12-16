<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Ayush@123'),
            'phone' => fake()->phoneNumber,
            'street' => fake()->streetAddress, // Added street field
            'landmark' => fake()->optional()->randomElement(['Apartment 2B', 'Building 1']), // Added landmark field with optional value
            'city' => fake()->city, // Added city field
            'state' => fake()->state, // Added state field
            'pincode' => fake()->postcode, // Added pincode field
            'country' => fake()->country, // Added country field
            'photo' => fake()->imageUrl('60', '60'),
            'role' => fake()->randomElement(['admin', 'vendor', 'user']),
            'status' => fake()->randomElement(['active', 'inactive']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
