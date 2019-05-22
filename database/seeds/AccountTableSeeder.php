<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            'account_id' => 5020308000003,
            'account_name' => 'Laboratory Supplies Expense-Academic',
        ]);

        DB::table('account')->insert([
            'account_id' => 5020301000001,
            'account_name' => 'Office Supplies Expenses',
        ]);
    }
}
