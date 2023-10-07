<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $permission = [
            ['name'=>'user list'],
            ['name'=>'create user'],
            ['name'=>'edit user'],
            ['name'=>'delete user'],
            ['name'=>'role list'],
            ['name'=>'create role'],
            ['name'=>'edit role'],
            ['name'=>'delete role'],
        ];

        foreach($permission as $item){
            Permission::create($item);
        }

        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);
    }
}
