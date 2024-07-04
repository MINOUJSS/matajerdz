<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Super_Admin_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //super_admin
        DB::table('super__admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => hash::make('admin123456'),
            'type' => 'super_admin',
        ]);
        //admin
        DB::table('super__admins')->insert([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => hash::make('test123456'),
            'type' => 'admin',
        ]);
    }
}
