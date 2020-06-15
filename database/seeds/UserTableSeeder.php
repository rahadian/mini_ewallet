<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\UserWallet;
        $user->username = "Andreas";
        $user->email = "andre@andre";
        $user->password = \Hash::make("andre132");
        $user->save();

        $this->command->info("User berhasil diinput");

    }
}
