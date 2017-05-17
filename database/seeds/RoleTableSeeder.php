<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::find(1);
        $role_user = \App\Role::where('id',5)->first();
        $user->roles()->attach($role_user);
    }
}
