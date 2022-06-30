<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $permissionList = [
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'permission-list',
        'permission-create',
        'permission-edit',
        'permission-delete',
        'warehouse-list',
        'warehouse-create',
        'warehouse-edit',
        'warehouse-delete',
        'category-list',
        'category-create',
        'category-edit',
        'category-delete',
        'product-list',
        'product-create',
        'product-edit',
        'product-delete',
        'customer-list',
        'customer-create',
        'customer-edit',
        'customer-delete',
        'expenses-list',
        'expenses-create',
        'expenses-edit',
        'expenses-delete',
        'invoice-list',
        'invoice-create',
        'invoice-edit',
        'invoice-delete',
        'loan-list',
        'loan-create',
        'loan-edit',
        'loan-delete',
    ];

    public function run()
    {
        $id = 1;
        foreach($this->permissionList as $permission) {
            DB::table('permissions')->insert([
                'id' => $id,
                'name' => $permission,
                'guard_name' => 'web'
            ]);
            $id++;
        }
      

    }

}
