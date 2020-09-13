<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' =>'PAUL',
            'last_name' =>'IDO',
            
        ]);
        Student::create([
            'first_name' =>'PAUL',
            'last_name' =>'IDO',
            
        ]);
        Student::create([
            'first_name' =>'PAUL',
            'last_name' =>'IDO',
            
        ]);
        Student::create([
            'first_name' =>'PAUL',
            'last_name' =>'IDO',
            
        ]);
    }
}
