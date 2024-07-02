<?php

use Illuminate\Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Test_Dropshiper_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dropshipers')->insert([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000000',
            'wilaya_id' => '8'
        ]);
    }
}
