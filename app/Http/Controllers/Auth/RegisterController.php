<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\EmployedType;
use App\Mail\TestEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            // 'name'          => ['required', 'string', 'max:255'],
            // 'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
            // 'last_name'     => ['required', 'string', 'max:255'],
            // 'phone_number'  => ['string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users'],
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
        $employedTypeId = EmployedType::where('title', '=', 'unemployed')->first();
        $user = User::whereId($data['user_id'])->first();

        $newData = [
            'name'              => $user->name,
            'last_name'         => $user->last_name,
            'phone_number'      => $user->phone_number,
            'email'             => $user->email,
            'password'          => Hash::make($data['password']),
        ];

        User::findOrFail($data['user_id'])->delete();
        
        return User::create([
            'name'              => $newData['name'],
            'last_name'         => $newData['last_name'],
            'email'             => $newData['email'],
            'password'          => $newData['password'],
            'activation_id'     => 1,
            'employed_type_id'  => $employedTypeId->id,
        ]);
    }
}
