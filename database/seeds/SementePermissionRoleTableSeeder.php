<?php



use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class SementePermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permissões do usuário admin
        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name','sementes')
        ->get();

        $role->permissions()->saveMany($permissions);
    }
}
