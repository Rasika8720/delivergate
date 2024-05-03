<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' =>Hash::make('12345678'),
        ]);

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@manager.com',
            'password' =>Hash::make('12345678'),
        ]);

        $cashier = User::create([
            'name' => 'Cashier User',
            'email' => 'cashier@cashier.com',
            'password' =>Hash::make('12345678'),
        ]);

        //Roles
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'api',
        ]);

        $managerRole = Role::create([
            'name' => 'manager',
            'guard_name' => 'api',
        ]);

        $cashierRole = Role::create([
            'name' => 'cashier',
            'guard_name' => 'api',
        ]);

        //Permissions
        $itemAddPermission = Permission::create([
            'name' => 'item.add',
            'guard_name' => 'api',
        ]);

        $itemRemovePermission = Permission::create([
            'name' => 'item.remove',
            'guard_name' => 'api',
        ]);

        $itemEditPermission = Permission::create([
            'name' => 'item.edit',
            'guard_name' => 'api',
        ]);

        $customerAddPermission = Permission::create([
            'name' => 'customer.add',
            'guard_name' => 'api',
        ]);

        $customerRemovePermission = Permission::create([
            'name' => 'customer.remove',
            'guard_name' => 'api',
        ]);

        $customerEditPermission = Permission::create([
            'name' => 'customer.edit',
            'guard_name' => 'api',
        ]);

        //Assign Role
        $admin->assignRole($adminRole);
        $manager->assignRole($managerRole);
        $cashier->assignRole($cashierRole);

        //Assign Permissions
        $adminRole->givePermissionTo($itemAddPermission);
        $adminRole->givePermissionTo($customerAddPermission);

        $managerRole->givePermissionTo($customerEditPermission);
        $managerRole->givePermissionTo($customerRemovePermission);

        $cashierRole->givePermissionTo($itemEditPermission);
        $cashierRole->givePermissionTo($itemRemovePermission);

    }
}
