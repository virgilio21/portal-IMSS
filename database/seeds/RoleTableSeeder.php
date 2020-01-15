<?php
use App\Role;
use App\user;
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
        //
        $role = new Role();
        $role -> name = 'admin';
        $role -> save();

        $role = new Role();
        $role -> name = 'teacher';
        $role -> save();

        $role = new Role();
        $role -> name = 'user';
        $role -> save();


        //administrador
        $user = new User();
        $user -> name = "Alejandro";
        $user -> surnames = "Gonzalez";
        $user -> enrollment = "E15080150";
        $user -> email = "administrador@gmail.com";
        $user -> address = "Domicilio conocido";
        $user -> password = Hash::make("administrador");
        $user -> phone = "999-999-9999";
        $user -> visibility = 1;
        $user -> save();
        $user -> Roles() -> attach(Role::where('name','admin')->first());


    }
}
