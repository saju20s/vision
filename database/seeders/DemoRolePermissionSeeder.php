<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [1,2,6,10,14,18,22,25,29,33,37,41,45,48,50];
        $roleId = 2;

        foreach ($permissions as $permissionId) {
            DB::table('role_has_permissions')->updateOrInsert(
                [
                    'role_id' => $roleId,
                    'permission_id' => $permissionId
                ]
            );
        }
    }
}
