<?php

namespace Database\Seeders;

use App\Models\User;
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
        $role = Role::create(['name' => 'Master Admin', 'guard_name' => 'web']);
        $guest = Role::create(['name' => 'Guest', 'guard_name' => 'web']);

        $permissionsAll = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'doctors',
                'permissions' => [
                    'doctors.view',
                    'doctors.add',
                    'doctors.edit',
                    'doctors.delete',
                ]
            ],
            [
                'group_name' => 'patients',
                'permissions' => [
                    'patients.view',
                    'patients.add',
                    'patients.edit',
                    'patients.delete',
                ]
            ],
            [
                'group_name' => 'reports_delivery',
                'permissions' => [
                    'reports_delivery.view',
                ]
            ],
            [
                'group_name' => 'bill',
                'permissions' => [
                    'bill.view',
                    'bill.add',
                ]
            ],
            [
                'group_name' => 'bill_history',
                'permissions' => [
                    'bill_history.view',
                    'bill_history.invoice',
                ]
            ],
            [
                'group_name' => 'invoice',
                'permissions' => [
                    'invoice.view',
                    'invoice.invoice',
                    'invoice.edit',
                ]
            ],
            [
                'group_name' => 'reports',
                'permissions' => [
                    'reports.view',
                    'reports.test',
                    'reports.delete',
                ]
            ],
            [
                'group_name' => 'investigations',
                'permissions' => [
                    'investigations.view',
                    'investigations.add',
                    'investigations.edit',
                    'investigations.delete',
                ]
            ],
            [
                'group_name' => 'investigation_form',
                'permissions' => [
                    'investigation_form.view',
                    'investigation_form.edit',
                ]
            ],
            [
                'group_name' => 'employees',
                'permissions' => [
                    'employees.view',
                    'employees.add',
                    'employees.edit',
                    'employees.delete',
                ]
            ],
            [
                'group_name' => 'expenses',
                'permissions' => [
                    'expenses.view',
                    'expenses.add',
                    'expenses.edit',
                    'expenses.delete',
                ]
            ],
            [
                'group_name' => 'expense_category',
                'permissions' => [
                    'expense_category.view',
                    'expense_category.add',
                    'expense_category.edit',
                    'expense_category.delete',
                ]
            ],
            [
                'group_name' => 'marketings',
                'permissions' => [
                    'marketings.view',
                    'marketings.add',
                    'marketings.edit',
                    'marketings.delete',
                ]
            ],
            [
                'group_name' => 'commisions',
                'permissions' => [
                    'commisions.view',
                    'commisions.edit',
                ]
            ],


            // Laboratory Code End

            [
                'group_name' => 'pages',
                'permissions' => [
                    'pages.view',
                    'pages.add',
                    'pages.edit',
                    'pages.delete',
                ]
            ],
            [
                'group_name' => 'sliders',
                'permissions' => [
                    'sliders.view',
                    'sliders.add',
                    'sliders.edit',
                    'sliders.delete',
                ]
            ],
            [
                'group_name' => 'gallery',
                'permissions' => [
                    'gallery.view',
                    'gallery.add',
                    'gallery.edit',
                    'gallery.delete',
                ]
            ],
            [
                'group_name' => 'blogs',
                'permissions' => [
                    'blogs.view',
                    'blogs.add',
                    'blogs.edit',
                    'blogs.delete',
                ]
            ],
            [
                'group_name' => 'commanders',
                'permissions' => [
                    'commanders.view',
                    'commanders.add',
                    'commanders.edit',
                    'commanders.delete',
                ]
            ],
            [
                'group_name' => 'links',
                'permissions' => [
                    'links.view',
                    'links.add',
                    'links.delete',
                ]
            ],
            [
                'group_name' => 'teams',
                'permissions' => [
                    'teams.view',
                    'teams.add',
                    'teams.edit',
                    'teams.delete',
                ]
            ],
            [
                'group_name' => 'courses',
                'permissions' => [
                    'courses.view',
                    'courses.add',
                    'courses.edit',
                    'courses.delete',
                ]
            ],
            [
                'group_name' => 'notice',
                'permissions' => [
                    'notice.view',
                    'notice.add',
                    'notice.edit',
                    'notice.delete',
                ]
            ],
            [
                'group_name' => 'noc',
                'permissions' => [
                    'noc.view',
                    'noc.add',
                    'noc.edit',
                    'noc.delete',
                ]
            ],
            [
                'group_name' => 'apa',
                'permissions' => [
                    'apa.view',
                    'apa.add',
                    'apa.edit',
                    'apa.delete',
                ]
            ],
            [
                'group_name' => 'videos',
                'permissions' => [
                    'videos.view',
                    'videos.add',
                    'videos.delete',
                ]
            ],
            [
                'group_name' => 'statement',
                'permissions' => [
                    'statement.view',
                    'statement.edit',
                ]
            ],
            [
                'group_name' => 'messages',
                'permissions' => [
                    'messages.view',
                    'messages.delete',
                ]
            ],
            [
                'group_name' => 'users',
                'permissions' => [
                    'users.view',
                    'users.add',
                    'users.edit',
                    'users.delete',
                ]
            ],
            [
                'group_name' => 'roles',
                'permissions' => [
                    'roles.view',
                    'roles.add',
                    'roles.edit',
                    'roles.delete',
                ]
            ],
            [
                'group_name' => 'permissions',
                'permissions' => [
                    'permissions.view',
                    'permissions.add',
                    'permissions.edit',
                    'permissions.delete',
                ]
            ],
            [
                'group_name' => 'application_settings',
                'permissions' => [
                    'application_settings.view',
                ]
            ],
            [
                'group_name' => 'settings/logo_&_identity',
                'permissions' => [
                    'settings/logo_&_identity.view',
                    'settings/logo_&_identity.edit',
                ]
            ],
            [
                'group_name' => 'settings/header_setting',
                'permissions' => [
                    'settings/header_setting.view',
                    'settings/header_setting.edit',
                ]
            ],
            [
                'group_name' => 'settings/footer_setting',
                'permissions' => [
                    'settings/footer_setting.view',
                    'settings/footer_setting.add',
                    'settings/footer_setting.edit',
                    'settings/footer_setting.delete',
                ]
            ],
            [
                'group_name' => 'settings/sidebar',
                'permissions' => [
                    'settings/sidebar.view',
                    'settings/sidebar.add',
                    'settings/sidebar.delete',
                ]
            ],
            [
                'group_name' => 'settings/academic_information',
                'permissions' => [
                    'settings/academic_information.view',
                    'settings/academic_information.edit',
                ]
            ],
            [
                'group_name' => 'settings/contact_setting',
                'permissions' => [
                    'settings/contact_setting.view',
                    'settings/contact_setting.edit',
                ]
            ],
            [
                'group_name' => 'settings/smtp',
                'permissions' => [
                    'settings/smtp.view',
                    'settings/smtp.edit',
                ]
            ],
            [
                'group_name' => 'activity',
                'permissions' => [
                    'activity.view',
                ]
            ],
            [
                'group_name' => 'report/signature',
                'permissions' => [
                    'report_signature.view',
                ]
            ],


        ];

        foreach ($permissionsAll as $permGroup) {
            $permissionGroup = $permGroup['group_name'];
            foreach ($permGroup['permissions'] as $permissionName) {
                $permission = Permission::create([
                    'name' => $permissionName,
                    'group_name' => $permissionGroup,
                    'guard_name' => 'web',
                ]);

                $role->givePermissionTo($permission);
                $permission->assignRole($role);
            }
        }

        $user = User::find(1);
        $user_two = User::find(2);

        if ($user) {
            $user->assignRole($role);
        }

        if ($user_two) {
            $user_two->assignRole($guest);
        }
    }
}
