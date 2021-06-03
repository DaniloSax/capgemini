<?php

use App\Models\Account;
use App\User;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('name', 'Danilo')->firstOrFail();

        if ($user->id) {
            Account::create([
                'user_id' =>  $user->id,
                'agency' => 250,
                'account' => 2100460,
                'balance' => 500.00
            ]);
        }
    }
}
