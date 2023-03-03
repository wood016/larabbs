<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 需清除缓存，否则会报错
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermission();
        // 先创建权限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);
        // 创建站长角色，并赋权
        $founder = Role::create(['name' => 'Founder']);
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');
        // 创建管理员角色，并赋权
        $maintainer = Role::create(['name' => 'Maintainer']);
        $maintainer->givePermissionTo('manage_contents');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除缓存，否则会报错
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        // 清空所有数据表的数据
        $tableNames = config('permission.table_names');

        \App\Models\Model::unguard();
        \Illuminate\Support\Facades\DB::table($tableNames['role_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['permissions'])->delete();
        \App\Models\Model::reguard();

    }
};
