<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role = new Role();
        $role->name = 'admin';
        $role->save();

        $role = new Role();
        $role->name = 'teacher';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->save();


        $user = new User();
        $user->name = 'Virgilio';
        $user->surnames = 'Padron Batun';
        $user->email = 'alumno@gmail.com';
        $user->address = '17a x 18 y 20';
        $user->phone = '999-999-4343';
        $user->enrollment= 'E15080429'; 
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();
        
        $user->roles()->attach(Role::where('name', 'user')->firstOrFail());


        $teacher = new User();
        $teacher->name = 'Jose';
        $teacher->surnames = 'Padron Batun';
        $teacher->email = 'maestro@gmail.com';
        $teacher->address = '17a x 18 y 20';
        $teacher->phone = '999-999-4343';
        $teacher->enrollment= 'E15080429'; 
        $teacher->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $teacher->save();

        $teacher->roles()->attach(Role::where('name', 'teacher')->firstOrFail());


        $teacher = new User();
        $teacher->name = 'Virgo';
        $teacher->surnames = 'Padron Batun';
        $teacher->email = 'admin@gmail.com';
        $teacher->address = '17a x 18 y 20';
        $teacher->phone = '999-999-4343';
        $teacher->enrollment= 'E15080429'; 
        $teacher->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $teacher->save();

        $teacher->roles()->attach(Role::where('name', 'admin')->firstOrFail());

    }
}
