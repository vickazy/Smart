<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'username' => 'admin',
          'password' => bcrypt('admin')
        ]);
    }
}
