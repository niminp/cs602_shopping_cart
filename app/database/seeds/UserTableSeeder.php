<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_customer = Role::where('name', 'customer')->first();
	    $role_admin  = Role::where('name', 'admin')->first();

	    $customer = new User();
	    $customer->name = 'Customer User';
	    $customer->email = 'customer@bu.edu';
	    $customer->password = bcrypt('password');
	    $customer->save();
	    $customer->roles()->attach($role_customer);

	    $customer2 = new User();
	    $customer2->name = 'Customer User 2';
	    $customer2->email = 'customer2@bu.edu';
	    $customer2->password = bcrypt('password');
	    $customer2->save();
	    $customer2->roles()->attach($role_customer);

	    $admin = new User();
	    $admin->name = 'Admin User';
	    $admin->email = 'admin@bu.edu';
	    $admin->password = bcrypt('password');
	    $admin->save();
	    $admin->roles()->attach($role_admin);
    }
}
