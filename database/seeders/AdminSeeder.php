<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorizedAdminEmail = [
            'adventuree.vr@gmail.com',
            'ardivaav@gmail.com'
        ];

        foreach ($authorizedAdminEmail as $email) {
            User::firstOrCreate(
                [
                    'email' => $email
                ],
                [
                    'name' => $email,
                    'email' => $email,
                    'password' => bcrypt(Str::random(8)),
                ]
            );
        }
    }
}
