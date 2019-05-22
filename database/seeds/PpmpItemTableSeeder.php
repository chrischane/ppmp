<?php

use Illuminate\Database\Seeder;

class PpmpItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppmp_item')->insert([
            'ppmp_item_id' => 2001,
            'ppmp_id' => 14107,
            'item_id' => 1001,
            'quarter' => 'FIRST QUARTER',
            'unit_price' => 50,
            'quantity' => 12,
            'amount' => 600,
        ]);

        DB::table('ppmp_item')->insert([
            'ppmp_item_id' => 2002,
            'ppmp_id' => 14105,
            'item_id' => 1002,
            'quarter' => 'SECOND QUARTER',
            'unit_price' => 180,
            'quantity' => 20,
            'amount' => 3600,
        ]);

        DB::table('ppmp_item')->insert([
            'ppmp_item_id' => 2003,
            'ppmp_id' => 14106,
            'item_id' => 1003,
            'quarter' => 'THIRD QUARTER',
            'unit_price' => 1500,
            'quantity' => 10,
            'amount' => 15000,
        ]);
    }
}
