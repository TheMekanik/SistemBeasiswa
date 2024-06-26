<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => "AdminFIK", 
            'level' => 'admin', 
            'email' => 'admin@admin.com', 
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);

        // Mitra::truncate();
        Mitra::create([
            'name' => "Genbi Indonesia", 
            'level' => 'mitra', 
            'email' => 'genbi@beasiswa.com', 
            'password' => bcrypt('fikXgenbi'), 
            'remember_token' => Str::random(60),
        ]);
    }
}
