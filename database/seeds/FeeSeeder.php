<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('tb_fee')->first() ==null){
            DB::table('tb_fee')->insert(['fee' => '20']);
        }
    }
}
