<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'Автор не известен',
                'email'=>'undef@gmail.com',
                'password'=> bcrypt(Str::random())
                
            ],
            [
                'name'=>'Автор',
                'email'=>'Author@gmail.com',
                'password'=> bcrypt(1)
            ]
        ];
        DB::table('users')->insert($data);
    }
}
