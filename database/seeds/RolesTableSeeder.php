<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'=>1,
                'name'=>'Admin',
                'guard_name' => 'web'
            ],
            [
                'id'=>2,
                'name' => 'Expert',
                'guard_name' => 'web'
            ],
            [
                'id'=>3,
                'name' => 'Customer',
                'guard_name' => 'web'
            ],

        ];

        Role::insert($roles);
    }
}
