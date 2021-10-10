<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Công việc 1', 'Task 2', 'Task 3'];
        foreach ($data as $item) {
            DB::table('todos')->insert([
                'task' => $item,
                'isCompleted' => false,
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00'
            ]);
        }

        $dataCompleted = ['Task 4', 'Task 5'];
        foreach ($dataCompleted as $item) {
            DB::table('todos')->insert([
                'task' => $item,
                'isCompleted' => true,
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00'
            ]);
        }
    }
}
