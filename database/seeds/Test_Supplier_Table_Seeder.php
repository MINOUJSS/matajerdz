<?php

use Illuminate\Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Test_Supplier_Table_Seeder extends Seeders
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->insert([
            'name' => 'supplier1',
            'email' => 'store1@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000000',
            'store_name' => 'store1',
            'type' => 'مستورد',
            'wilaya_id' => '8',
            'created_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
        //
        DB::table('suppliers')->insert([
            'name' => 'supplier2',
            'email' => 'store2@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000001',
            'store_name' => 'store2',
            'type' => 'صاحب مصنع',
            'wilaya_id' => '19','created_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
