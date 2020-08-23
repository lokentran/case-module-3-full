<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1, 'name'=>'Tran Thanh Tung', 'email'=>'thanhtungmarine@gmail.com', 'password'=>bcrypt('123456')],
            ['id'=>2, 'name'=>'Nguyễn Huy Hoàng', 'email'=>'hoang@gmail.com', 'password'=>bcrypt('123456')],
            ['id'=>3, 'name'=>'Trần Đăng Huynh', 'email'=>'danghuynh@gmail.com', 'password'=>bcrypt('123456')],
        ]);
    }
}
