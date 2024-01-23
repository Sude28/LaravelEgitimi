<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run():void  //Uygulama çalışöadan önce kaydetmek istediğimiz kullanıcıları burada ekelyeceğiz
    {
        DB::table('users')->insert([   //inserte dizi şeklinde ekleriz
        [   
            'name'=> 'Sude',
            'email' => 'sudetelli002@hotmail.com',
            'password' => bcrypt('12345678')
        ],
        [
            'name'=> 'Buse',
            'email' => 'busetelli02@hotmail.com',
            'password' => bcrypt('280602sb') 
        ]       
        ]);
    }
}
