<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            'item_id' => 1001,
            'description' => 'All purpose Glue',
            'specification' => 'Glue,White 130g',
            'unit' => 'pcs'
        ]);

        DB::table('item')->insert([
            'item_id' => 1002,
            'description' => 'Bondpaper',
            'specification' => 'White S-20 A4',
            'unit' => 'ream'
        ]);

        DB::table('item')->insert([
            'item_id' => 1003,
            'description' => 'Paper',
            'specification' => 'Bond Substance 20 Legal White',
            'unit' => 'box'
        ]);
    }
}
