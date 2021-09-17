<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Task 1', 'Task 2', 'Task 3'];

        foreach ($data as $item) {
            DB::table('todos')->insert([
                'title' => $item,
                'content' => Str::random(50),
                'due' => new DateTime(),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
