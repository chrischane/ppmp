<?php

use Illuminate\Database\Seeder;

class FundSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fund_source')->insert([
            'fs_id' => 001,
            'fs_name' => 'Fiduciary'
        ]);

        DB::table('fund_source')->insert([
            'fs_id' => 002,
            'fs_name' => 'Income'
        ]);
    }
}
