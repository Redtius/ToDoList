<?php

namespace Database\Seeders;

use App\Models\task;
use App\Models\todolist;
use database\seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncate('todolists');
        todolist::factory(3)
            //->has(task::factory(5),'tasks')
            ->create();
    }
}
