<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Test_User_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //product_confirmateur
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@mail.com',
            'phone' => '0660000000',
            'password' => hash::make('test123456'),
            'type' => 'product_confirmateur',
            'wilaya_id' => 8
        ]);
        //service_confirmateur 
        DB::table('users')->insert([
            'name' => 'test2',
            'email' => 'test2@mail.com',
            'phone' => '0660000001',
            'password' => hash::make('test123456'),
            'type' => 'service_confirmateur',
            'wilaya_id' => 8
        ]);
        //livreur
        DB::table('users')->insert([
            'name' => 'test3',
            'email' => 'test3@mail.com',
            'phone' => '0660000002',
            'password' => hash::make('test123456'),
            'type' => 'livreur',
            'wilaya_id' => 8
        ]);
        //bloger
        DB::table('users')->insert([
            'name' => 'test4',
            'email' => 'test4@mail.com',
            'phone' => '0660000003',
            'password' => hash::make('test123456'),
            'type' => 'bloger',
            'wilaya_id' => 8
        ]);
        //frontend_devloper
        DB::table('users')->insert([
            'name' => 'test5',
            'email' => 'test5@mail.com',
            'phone' => '0660000004',
            'password' => hash::make('test123456'),
            'type' => 'frontend_devloper',
            'wilaya_id' => 8
        ]);
        //backend_devloper
        DB::table('users')->insert([
            'name' => 'test6',
            'email' => 'test6@mail.com',
            'phone' => '0660000005',
            'password' => hash::make('test123456'),
            'type' => 'backend_devloper',
            'wilaya_id' => 8
        ]);
        //service_suport 
        DB::table('users')->insert([
            'name' => 'test7',
            'email' => 'test7@mail.com',
            'phone' => '0660000006',
            'password' => hash::make('test123456'),
            'type' => 'service_suport',
            'wilaya_id' => 8
        ]);
        //police
        DB::table('users')->insert([
            'name' => 'test8',
            'email' => 'test8@mail.com',
            'phone' => '0660000007',
            'password' => hash::make('test123456'),
            'type' => 'police',
            'wilaya_id' => 8
        ]);
        //tex_verificateur
        DB::table('users')->insert([
            'name' => 'test9',
            'email' => 'test9@mail.com',
            'phone' => '0660000008',
            'password' => hash::make('test123456'),
            'type' => 'tex_verificateur',
            'wilaya_id' => 8
        ]);
        //customer
        DB::table('users')->insert([
            'name' => 'test10',
            'email' => 'test10@mail.com',
            'phone' => '0660000009',
            'password' => hash::make('test123456'),
            'type' => 'customer',
            'wilaya_id' => 8
        ]);
        //freelercer
        DB::table('users')->insert([
            'name' => 'test11',
            'email' => 'test11@mail.com',
            'phone' => '0660000010',
            'password' => hash::make('test123456'),
            'type' => 'freelercer',
            'wilaya_id' => 8
        ]);
    }
}
