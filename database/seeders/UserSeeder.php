<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Passenger;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registers = [
            [
            'name' => 'Administrador',
            'lastname' => 'Del sistema', 
            'email' => 'administrador@example.com',
            'password'=> Hash::make('1234'),
            'birthday' => '1990-01-01',
            'created_by' => 1
            ]
        ];

        foreach ($registers as $register) {
        	Passenger::create($register);
        }
    }
}
