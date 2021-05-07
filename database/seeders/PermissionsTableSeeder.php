<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'brand_create',
            ],
            [
                'id'    => 18,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 19,
                'title' => 'brand_show',
            ],
            [
                'id'    => 20,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 21,
                'title' => 'brand_access',
            ],
            [
                'id'    => 22,
                'title' => 'category_create',
            ],
            [
                'id'    => 23,
                'title' => 'category_edit',
            ],
            [
                'id'    => 24,
                'title' => 'category_show',
            ],
            [
                'id'    => 25,
                'title' => 'category_delete',
            ],
            [
                'id'    => 26,
                'title' => 'category_access',
            ],
            [
                'id'    => 27,
                'title' => 'post_create',
            ],
            [
                'id'    => 28,
                'title' => 'post_edit',
            ],
            [
                'id'    => 29,
                'title' => 'post_show',
            ],
            [
                'id'    => 30,
                'title' => 'post_delete',
            ],
            [
                'id'    => 31,
                'title' => 'post_access',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 35,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 36,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 37,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 38,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 39,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 40,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 41,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 42,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 43,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 44,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 45,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 46,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
