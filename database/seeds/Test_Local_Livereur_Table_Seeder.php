<?php

use Illuminate\Database\Seeders;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\DB;

class Test_Local_Livereur_Table_Seeder extends Seeders
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('local_livereurs')->insert([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000000',
            'company_name' => 'test',
            'wilaya_id' => '8'
        ]);
    }
}
