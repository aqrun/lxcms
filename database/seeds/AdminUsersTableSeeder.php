<?php

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Faker\Generator::class);
        $users = factory(AdminUser::class)
            ->times(10)
            ->make()
            ->each(function($user, $index){
                $user->avatar = '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg';
            });

        // to array
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        AdminUser::insert($user_array);
    }
}

