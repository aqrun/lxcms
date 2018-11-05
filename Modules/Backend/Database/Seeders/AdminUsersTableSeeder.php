<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker;
use Modules\Backend\Entities\AdminUser;

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
            ->times(123)
            ->make()
            ->each(function($user, $index){
                $user->avatar = '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg';
            });

        // to array
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        AdminUser::insert($user_array);
    }
}
