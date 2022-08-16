<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(User::setupPermissions() as $controller => $actions)
        {
            foreach($actions as $action)
            {
                $permission_name = "{$controller}.{$action}";
                Permission::create(['name' => $permission_name]);
            }
        }
    }
}
