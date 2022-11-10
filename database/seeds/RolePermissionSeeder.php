<?php

use App\CompniesDetail;
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
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',

            'view-plan',
            'create-plan',
            'update-plan',
            'destroy-plan',

            'view-role',
            'create-role',
            'destroy-role',
            'update-role',

            'order-list',
            'approve-order',

            'superadmin-dashboard',
            'admin-dashboard',
            'user-dashboard',

            'manage-company-profile',
            'manage-company-profile',
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

        $adminPermissions = [
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',
            'view-role',
            'admin-dashboard',
            'manage-company-profile',
        ];
        $usr->assignRole($admin);
        $usr->syncPermissions($permissions);

        // Create admin & role
        $admin= Role::create(['name' => 'admin']);
        $admin->syncPermissions($permissions);
        $usr = User::create([
            'name'=> 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'status' => true,
            'company_id' => 1, // create company
            'email_verified_at' => now(),
        ]);

        // create default company
        $company = new CompniesDetail();
        $company->company_name = 'admin';
        $company->user_id = $usr->id;
        $company->save();

        $usr->company_id = $company->id;
        $usr->update();

        $usr->assignRole($admin);
        $usr->syncPermissions($adminPermissions);

        $userPermissions = [
            'user-dashboard',
            'order-list',
        ];
        $usr->assignRole($admin);
        $usr->syncPermissions($permissions);

        // Create admin & role
        $admin= Role::create(['name' => 'user']);
        $admin->syncPermissions($userPermissions);
        $usr = User::create([
            'name'=> 'User',
            'email' => 'user@gmail.com',
            'password' => 'admin',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);
        $usr->syncPermissions($userPermissions);


        // create roels list for admin that can't be changed
        Role::create(['name' => 'agent', 'role_for' =>2]);
        Role::create(['name' => 'inspector', 'role_for' => 2]);
        Role::create(['name' => 'viewer', 'role_for' => 2]);
        Role::create(['name' => 'requestManager', 'role_for' => 2]);
    }
}
