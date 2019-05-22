<?php

use Illuminate\Database\Seeder;

class CostCenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cost_center')->insert([
            'cc_name' => 'College of Computer Studies',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Science and Mathematics',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Engineering and Technology',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Education',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Nursing',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Business and Administration',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'College of Arts and Social Sciences',
        ]);

        DB::table('cost_center')->insert([
            'cc_name' => 'Bids and Awards Committee',
        ]);
    }
}
