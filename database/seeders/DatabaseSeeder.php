<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\School;
use App\Models\Group;
use App\Models\Subject;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        School::factory(10)->create();
        User::factory(305)->create();
        User::create([
            'name' => 'Freddy',
            'email' => 'freddysae0@gmail.com',
            'password' => Hash::make('12345678'),
            'school_id' => random_int(1, 10),
        ]);

        $subjects = Subject::factory(40)->create();
        Group::factory(100)
            ->hasAttached(
                $subjects, // Cada grupo tendrá entre 1 y 5 materias
                fn() => [
                    "day" => random_int(1, 7),
                    "turn" => fake()->time('H:i'),
                ], // Aquí podrías agregar datos extra si la tabla pivote tiene columnas adicionales
            )
            ->create();
    }
}
