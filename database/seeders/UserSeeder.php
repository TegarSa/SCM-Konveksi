<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@.co.id',
                'phone' => '08170039080',
                'institution' => 'syncore',
                'level' => 'admin',
                'password' => Hash::make('syncore12345')
            ],

            [
                'name' => 'editor',
                'email' => 'editor@blud.co.id',
                'phone' => '08170039080',
                'institution' => 'syncore',
                'level' => 'editor',
                'password' => Hash::make('syncore12345')
            ],
            [
                'name' => 'author',
                'email' => 'author@blud.co.id',
                'phone' => '08170039080',
                'institution' => 'syncore',
                'level' => 'author',
                'password' => Hash::make('syncore12345')
            ],
            [
                'name' => 'user',
                'email' => 'user@blud.co.id',
                'phone' => '08170039080',
                'institution' => 'syncore',
                'level' => 'subscriber',
                'password' => Hash::make('syncore12345')
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
