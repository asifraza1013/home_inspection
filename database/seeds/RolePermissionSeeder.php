<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'update-settings',
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',
            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',
            'view-activity-log',
            // 'view-category',
            // 'create-category',
            // 'update-category',
            // 'destroy-category',
            // 'view-post',
            // 'create-post',
            // 'update-post',
            // 'destroy-post',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Create Super user & role
        $admin= Role::create(['name' => 'super-admin']);
        $admin->syncPermissions($permissions);
        $usr = User::create([
            'name'=> 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => 'admin',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);
        $usr->syncPermissions($permissions);


        // Create user & role
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('update-settings');
        $role->givePermissionTo('view-user');

        $user = User::create([
            'name'=> 'User',
            'email' => 'user@email.com',
            'password' => 'admin',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $user->assignRole($role);

        $adminPermissions = [
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',
            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',
        ];

        // Create Super user & role
        $adminRole= Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);

        // Create user & role
        $inspector = User::create([
            'name'=> 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $inspector->assignRole($adminRole);
        $inspector->syncPermissions($adminPermissions);
        // $inspector->givePermissionTo('update-settings');
        // $inspector->givePermissionTo('view-user');
        // $inspector->givePermissionTo('create-user');
        // $inspector->givePermissionTo('update-user');
        // $inspector->givePermissionTo('destroy-user');
        // $inspector->givePermissionTo('view-role');
        // $inspector->givePermissionTo('view-permission');
        // $inspector->givePermissionTo('create-role');
        // $inspector->givePermissionTo('update-role');
        // $inspector->givePermissionTo('update-permission');
        // $inspector->givePermissionTo('destroy-role');
        // $inspector->givePermissionTo('destroy-role');
    }
}
