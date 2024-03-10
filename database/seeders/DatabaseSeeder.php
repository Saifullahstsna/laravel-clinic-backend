<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'saifullah26@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '08123456789'
        ]);

        //seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'PULLS KLINIK',
            'address' => 'Jl. Traktor IV, Perum. Gerhana Alauddin',
            'phone' => '08123456789',
            'email' => 'saifullah26@gmail.com',
            'doctor_name' => 'Dr. Saifullah',
            'kode_unik' => '123456789',
        ]);

        //call
        $this->call(DoctorSeeder::class);
    }
}
