<?php

namespace Database\Factories;

use App\Models\task;
use App\Models\todolist;
use Database\Factories\FactoryHelpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = task::class;
    public function definition(): array
    {
        return [
            'deadline'=>fake()->dateTimeThisYear(),
            'name'=> 'untitled',
            'status'=> 'Undone',
            'Description' => 'Lorem ipsum',
            'list_id' => FactoryHelper::GetRandomId(todolist::class)
        ];
    }
}
