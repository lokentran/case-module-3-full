<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id'=>1, 'name'=>'Rau'],
            ['id'=>2, 'name'=>'Củ'],
            ['id'=>3, 'name'=>'Quả']            
        ]);
    }
}
