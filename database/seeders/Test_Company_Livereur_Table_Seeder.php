<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Test_Company_Livereur_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('company_livereurs')->insert([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => hash::make('test123456'),
            'phone' => '0660000000',
            'company_name' => 'test',
            'wilaya_id' => '8'
        ]);
    }
}
