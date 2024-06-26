<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = [
            'name' => 'Juni Yadi',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ];

        // create admin user
        $juni = User::create($user);
        Admin::create(['user_id' => $juni->id]);

        $evelyn = User::create(array_merge($user, [
            'name' => 'Evelyn',
            'email' => 'evelyn@example.com',
        ]));
        Admin::create(['user_id' => $evelyn->id]);

        $ari = User::create(array_merge($user, [
            'name' => 'Ari',
            'email' => 'ari@example.com',
        ]));
        Admin::create(['user_id' => $ari->id]);

    }
}
