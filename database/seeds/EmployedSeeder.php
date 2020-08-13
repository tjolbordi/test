<?php

use Illuminate\Database\Seeder;
use App\EmployedType;

class EmployedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (EmployedType::where('title', '=', 'employed')->first() === null) {
            $employed = EmployedType::create([
                'title'  => 'employed',
            ]);
        }
        if (EmployedType::where('title', '=', 'unemployed')->first() === null) {
            $unemployed = EmployedType::create([
                'title'  => 'unemployed',
            ]);
        }
    }
}
