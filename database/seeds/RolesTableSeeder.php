<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

		$roles = [
			['name' => 'admin'],
			['name' => 'manager'],
			['name' => 'staff']
		];

		foreach ($roles as $role) {
            Role::create($role);
        }

        $permissions = Permission::pluck('id')->all();

        $role = Role::where('name', 'admin')->first();

        $role->syncPermissions($permissions);


    }
}
