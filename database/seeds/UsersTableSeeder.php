<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'location'      => 'Gaborone',
            'password'       => '$2y$10$VTKuN1FowWv1fyd2xdTkzOTw5ZYDFeooBV.j6/P99tJLfY4DYtEU6',
            'remember_token' => null,
        ]);
        $role = Role::find(1);
        $user->assignRole($role);

    }
}
