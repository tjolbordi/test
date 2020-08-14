<?php

use Illuminate\Database\Seeder;
use App\User;
use App\EmployedType;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employdId = EmployedType::where('title', '=', 'unemployed')->first();
        $roleId = Role::where('title', '=', 'employed')->first();
        $seededJumberPhone = '12345';
        $seededSeconJumberPhone = '67890';

        $user = User::where('phone_number', '=', $seededJumberPhone)->first();
        
        if ($user === null) {
            $user = User::create([
                'name'                           => 'jumber',
                'last_name'                      => 'patiashvili',
                'email'                          => 'jumberpate@gmail.com',
                'employed_type_id'               => $employdId->id,
                'phone_number'                   => $seededJumberPhone,
                'password'                       => Hash::make('password'),
                'role_id'                        => $roleId->id,
            ]);

        $user->save();
        }

        $secondUser = User::where('phone_number', '=', $seededSeconJumberPhone)->first();
        
        if ($secondUser === null) {
            $secondUser = User::create([
                'name'                           => 'jumber',
                'last_name'                      => 'pateishvili',
                'email'                          => 'jumberpati@gmail.com',
                'employed_type_id'               => $employdId->id,
                'phone_number'                   => $seededSeconJumberPhone,
                'password'                       => Hash::make('password'),
                'role_id'                        => $roleId->id,
            ]);

        $secondUser->save();
        }
    }
}
