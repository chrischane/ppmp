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
         $this->call(CostCenterTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(FundSourceTableSeeder::class);
         $this->call(AccountTableSeeder::class);
         $this->call(PpmpTableSeeder::class);
         $this->call(ItemTableSeeder::class);
         $this->call(PpmpItemTableSeeder::class);
    }
}
