<?php

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('model_has_roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = Role::all();

        foreach ($roles as $role) {
            if ($role->name == 'super_admin') {
                $user = User::create([
                    'name' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => bcrypt('12345678'),
                ]);
            } else {
                $user = User::create([
                    'name' => $role->name,
                    'email' => $role->name . '@example.com',
                    'password' => bcrypt('12345678'),
                ]);
            }

            $user->assignRole($role);
        }
    }
}
