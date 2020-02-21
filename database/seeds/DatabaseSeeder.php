<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = 'Admin';
      $user->email = 'admin@admin.com';
      $user->email_verified_at = now();
      $user->password  = bcrypt('123');
      $user->save();
    }
}
