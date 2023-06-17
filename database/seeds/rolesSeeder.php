<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        if (! Permission::exists()) {
            // create permissions
            Permission::create(['name' => 'show users']);
            Permission::create(['name' => 'manage users']);

            Permission::create(['name' => 'show service']);
            Permission::create(['name' => 'manage service']);

            Permission::create(['name' => 'show providers']);
            Permission::create(['name' => 'manage providers']);

            Permission::create(['name' => 'show branches']);
            Permission::create(['name' => 'manage branches']);

            Permission::create(['name' => 'show rooms']);
            Permission::create(['name' => 'manage rooms']);

            Permission::create(['name' => 'show beneficiaries']);
            Permission::create(['name' => 'manage beneficiaries']);

            Permission::create(['name' => 'show user group']);
            Permission::create(['name' => 'manage user group']);

            Permission::create(['name' => 'show user type']);
            Permission::create(['name' => 'manage user type']);

            Permission::create(['name' => 'show accounting records']);
            Permission::create(['name' => 'manage accounting records']);

            Permission::create(['name' => 'show department']);
            Permission::create(['name' => 'manage department']);

            $adminRole = Role::create(['name' => 'admin']);

            $firmAdminRole = Role::create(['name' => 'firm admin']);
            $firmAdminRole->givePermissionTo('show service');
            $firmAdminRole->givePermissionTo('manage service');
            $firmAdminRole->givePermissionTo('show providers');
            $firmAdminRole->givePermissionTo('manage providers');
            $firmAdminRole->givePermissionTo('show branches');
            $firmAdminRole->givePermissionTo('manage branches');
            $firmAdminRole->givePermissionTo('show rooms');
            $firmAdminRole->givePermissionTo('manage rooms');
            $firmAdminRole->givePermissionTo('show beneficiaries');
            $firmAdminRole->givePermissionTo('manage beneficiaries');
            $firmAdminRole->givePermissionTo('show user group');
            $firmAdminRole->givePermissionTo('manage user group');
            $firmAdminRole->givePermissionTo('show user type');
            $firmAdminRole->givePermissionTo('manage user type');
            $firmAdminRole->givePermissionTo('show accounting records');
            $firmAdminRole->givePermissionTo('manage accounting records');
            $firmAdminRole->givePermissionTo('show department');
            $firmAdminRole->givePermissionTo('manage department');
            // $firmAdminRole->givePermissionTo('show users');
            // $firmAdminRole->givePermissionTo('manage users');


            $firmUserRole = Role::create(['name' => 'firm user']);

        }

        $newUser = User::updateOrCreate([
            'email'   => "admin@gmail.com",
        ],[
            'password'     => "$2y$10$5MQCE3B8qlvVewlBH408W.2UIW.lnPrOADl9Y.TvXZJMdDflo5yi.",
            'name' => "admin",
            'email_verified_at'=> null,
            'remember_token'=> null,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'type'=>1
        ]);
        $newUser->assignRole('admin');

    }
}
