<?php

use App\Ability;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);
        $abilities = Ability::all();
        foreach ($abilities as $ability){
            $admin->allowTo($ability);
        }
    }
}
