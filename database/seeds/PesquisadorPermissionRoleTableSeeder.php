<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PesquisadorPermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'pesquisador')->firstOrFail();
        $permissions = Permission::where('table_name','sementes')
        ->get();

        $role->permissions()->saveMany($permissions);
    }
}
