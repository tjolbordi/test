<?php

use Illuminate\Database\Seeder;
use App\User;
use App\EmployedType;

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
        $seededJumberPhone = '12345';
        $user = User::where('phone_number', '=', $seededJumberPhone)->first();
        
        if ($user === null) {
            $user = User::create([
                'name'                           => 'jumber',
                'last_name'                      => 'patiashvili',
                'email'                          => 'jumberpate@gmail.com',
                'employed_type_id'               => $employdId->id,
                'phone_number'                   => $seededJumberPhone,
                'password'                       => Hash::make('password'),
            ]);

        $user->save();
        }
    }
}
