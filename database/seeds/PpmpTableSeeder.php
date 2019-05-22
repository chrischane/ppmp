<?php

use Illuminate\Database\Seeder;

class PpmpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppmp')->insert([
            'ppmp_id' => 14107,
            'cc_id' => 01,
            'fs_id' => 001,
            'account_id' => 5020308000003,
            'type' => 'Primary',
            'year' => date("Y-m-d H:i:s"),
        ]);

        DB::table('ppmp')->insert([
            'ppmp_id' => 14105,
            'cc_id' => 02,
            'fs_id' => 001,
            'account_id' => 5020301000001,
            'type' => 'Secondary',
            'year' => date("Y-m-d H:i:s"),
        ]);

        DB::table('ppmp')->insert([
            'ppmp_id' => 14106,
            'cc_id' => 03,
            'fs_id' => 002,
            'account_id' => 5020308000003,
            'type' => 'Primary',
            'year' => date("Y-m-d H:i:s"),
        ]);
    }
}
