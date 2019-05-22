<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ccs Acc',
            'email' => 'ccs@gmail.com',
            'username' => 'ccs',
            'cc_id' => 1,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'csm Acc',
            'email' => 'csm@gmail.com',
            'username' => 'csm',
            'cc_id' => 2,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'cet Acc',
            'email' => 'cet@gmail.com',
            'username' => 'cet',
            'cc_id' => 3,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'ced Acc',
            'email' => 'ced@gmail.com',
            'username' => 'ced',
            'cc_id' => 4,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'con Acc',
            'email' => 'con@gmail.com',
            'username' => 'con',
            'cc_id' => 5,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'cba Acc',
            'email' => 'cba@gmail.com',
            'username' => 'cba',
            'cc_id' => 6,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'cass Acc',
            'email' => 'cass@gmail.com',
            'username' => 'cass',
            'cc_id' => 7,
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'bac Acc',
            'email' => 'bac@gmail.com',
            'username' => 'bac',
            'cc_id' => 8,
            'password' => bcrypt('secret'),
        ]);
    }
}
