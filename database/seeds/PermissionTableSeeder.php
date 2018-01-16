<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'product-list',
        		'display_name' => 'Display Product Listing',
        		'description' => 'See only Listing Of Product'
        	],
        	[
        		'name' => 'product-create',
        		'display_name' => 'Create Product',
        		'description' => 'Create New Product'
        	],
        	[
        		'name' => 'product-edit',
        		'display_name' => 'Edit Product',
        		'description' => 'Edit Product'
        	],
        	[
        		'name' => 'product-delete',
        		'display_name' => 'Delete Product',
        		'description' => 'Delete Product'
        	],
        	[
        		'name' => 'permission-maintain',
        		'display_name' => 'Maintain Permission',
        		'description' => 'Maintain Permission'
        	]
        ];


        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
