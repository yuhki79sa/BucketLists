<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choice_categories')->insert([
            ['name' => 'やってみたい'],
            ['name' => 'やってみたくない'],
            ['name' => 'やった'],
            ['name' => '特になし'],
        ]);
    }
}
