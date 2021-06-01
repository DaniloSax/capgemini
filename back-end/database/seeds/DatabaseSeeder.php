<?php

use App\Models\Account;
use App\User;
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
        $this->call(UserSeeder::class);

        factory(User::class, 5)->create()->each(function (User $user) {
            factory(Account::class, 1)->create(['user_id' => $user->id]);
        });
    }
}
