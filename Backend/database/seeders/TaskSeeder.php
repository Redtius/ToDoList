<?php

namespace Database\Seeders;

use App\Models\task;
use database\seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $this->truncate('tasks');
//        task::factory(20)->create();
    }
}
