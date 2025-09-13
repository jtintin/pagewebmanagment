<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ROLES
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $userRole = Role::create(['name' => 'user']);

        // PERMISSIONS
        // Categories
        $permissionIndexCategory = Permission::create(['name' => 'view categories']);
        $permissionCreateCategory = Permission::create(['name' => 'create categories']);
        $permissionEditCategory = Permission::create(['name' => 'edit categories']);
        $permissionDeleteCategory = Permission::create(['name' => 'delete categories']);
        // Services
        $permissionIndexService = Permission::create(['name' => 'view services']);
        $permissionCreateService = Permission::create(['name' => 'create services']);
        $permissionEditService = Permission::create(['name' => 'edit services']);
        $permissionDeleteService = Permission::create(['name' => 'delete services']);
        // Posts
        $permissionIndexPost = Permission::create(['name' => 'view posts']);
        $permissionCreatePost = Permission::create(['name' => 'create posts']);
        $permissionEditPost = Permission::create(['name' => 'edit posts']);
        $permissionDeletePost = Permission::create(['name' => 'delete posts']);
        $permissionPublishPost = Permission::create(['name' => 'publish posts']);
        // Users
        $permissionIndexUser = Permission::create(['name' => 'view users']);
        $permissionCreateUser = Permission::create(['name' => 'create users']);
        $permissionEditUser = Permission::create(['name' => 'edit users']);
        $permissionDeleteUser = Permission::create(['name' => 'delete users']);
        $permissionAssignRoles = Permission::create(['name' => 'assign roles']);
        $permissionAssignPermissions = Permission::create(['name' => 'assign permissions']);

        // Assign permissions to roles
        // Admin role: all permissions
        $adminRole->givePermissionTo(Permission::all());
        // Editor role: specific permissions
        $editorRole->givePermissionTo([
            $permissionIndexCategory,
            $permissionEditCategory,
            $permissionIndexService,
            $permissionEditService,
        ]);

    }
}
