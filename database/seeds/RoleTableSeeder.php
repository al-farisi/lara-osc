<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        	[
        		'name' => 'super-admin',
        		'display_name' => 'Super Admin',
        		'description' => 'The super admin'
        	],
        	[
        		'name' => 'admin',
        		'display_name' => 'Admin',
        		'description' => 'The Admin'
        	],
        	[
        		'name' => 'user',
        		'display_name' => 'User',
        		'description' => 'The user'
        	]
        ];


        foreach ($role as $key => $value) {
        	Role::create($value);
        }
    }
}
