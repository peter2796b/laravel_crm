<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User();

        $admin->name = 'Peter Braganza';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password'); //encrypt the password
        
        $admin->save();
    }
}
