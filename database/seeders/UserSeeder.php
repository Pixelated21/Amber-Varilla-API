<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Database\Factories\UserDetailFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(UserDetailFactory::new(), 'userDetail')
            ->count(5)->create();
    }
}
