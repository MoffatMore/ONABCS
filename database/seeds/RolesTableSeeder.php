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
                'name'=>'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Customer',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Expert',
                'guard_name' => 'web'
            ]
        ];

        Role::insert($roles);
    }
}
