<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            Wilaya_Table_Seeder::class,
            Dayra_Table_Seeder::class,
            Baladia_Table_Seeder::class,
            Super_Admin_Table_Seeder::class,
            Test_Company_Livereur_Table_Seeder::class,
            Test_Dropshiper_Table_Seeder::class,
            Test_Local_Livereur_Table_Seeder::class,
            Test_Seller_Table_Seeder::class,
            Test_Supplier_Table_Seeder::class,
            Test_User_Table_Seeder::class,
        ]);
    }
}
