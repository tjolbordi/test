<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::where('title', '=', 'employed')->first() === null) {
            $employed = Role::create([
                'title'  => 'employed',
            ]);
        }
        if (Role::where('title', '=', 'employer')->first() === null) {
            $employer = Role::create([
                'title'  => 'employer',
            ]);
        }
    }
}
