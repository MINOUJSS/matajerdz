<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Test_Seller_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sellers')->insert([
            'name' => 'seller1',
            'email' => 'store1@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000000',
            'store_name' => 'store1',
            'wilaya_id' => '8',
            'created_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
         //
         DB::table('sellers')->insert([
            'name' => 'seller2',
            'email' => 'store2@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000001',
            'store_name' => 'store2',
            'wilaya_id' => '8',
            'created_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
