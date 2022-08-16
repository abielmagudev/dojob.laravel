<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$permissions = Permission::all();

        foreach(User::setupRoles() as $name => $settings)
        {
            $role = Role::create(['name' => $name]);

            foreach($settings as $controller => $actions)
            {
                $permissions = array_map(function ($action) use ($controller) {
                    return "{$controller}.{$action}";
                }, $actions);
            }

            $role->syncPermissions($permissions);
        }
    }
}
