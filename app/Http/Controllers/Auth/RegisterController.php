<?php

namespace App\Http\Controllers\Auth;

<<<<<<< HEAD
=======
use App\Role;
>>>>>>> landing
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'surname' => ['required', 'string', 'max:100',],
            'address' => ['required', 'string', 'max:100',],
            'enrollment' => ['required', 'string', 'min:6','max:100',],
            'phone' => ['required', 'string', 'size:12'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
<<<<<<< HEAD
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'surnames' => $data['surname'],
            'enrollment' => $data['enrollment'],
            'address' => $data['address'],
            'phone' => $data['phone'],

        ]);
    }
=======

        $user = new User;
        $user -> name= $data['name'];
        $user -> email = $data['email'];
        $user -> password =  Hash::make($data['password']);
        $user -> surnames = $data['surname'];
        $user -> enrollment = $data['enrollment'];
        $user -> address = $data['address'];
        $user -> phone = $data['phone'];
        $user -> semester = 1;
        $user -> visibility = true;
        $user -> save();
        $user -> Roles() -> attach(Role::where('name','user')->first());

        return $user;
    }

    
>>>>>>> landing
}
