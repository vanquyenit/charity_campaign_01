<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        factory(User::class, 20)->create()->each(function ($user) {
            $user->update([
                'is_active' => config('constants.ACTIVATED'),
            ]);
        });

        factory(User::class)->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'avatar' => 'default.jpg',
            'star' => 5,
            'role' => config('settings.role.admin'),
            'phone_number' => '098625326',
            'remember_token' => str_random(10),
        ])->update([
            'is_active' => config('constants.ACTIVATED'),
        ]);
    }
}
