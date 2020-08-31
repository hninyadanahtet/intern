<?php

use App\User;
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
       
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admins@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        
        $user->assignRole('admin');
    }
       
    
}
