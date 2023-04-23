<?php

namespace Database\Factories;

use App\Models\todolist;
use App\Models\User;
use Database\Factories\FactoryHelpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\todolist>
 */
class TodolistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = todolist::class;
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'user_id' => FactoryHelper::GetRandomId(User::class),
        ];
    }
}
