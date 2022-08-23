<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   //Category::truncate();

        \App\Models\User::factory(30)->create();
        \App\Models\Company::factory(30)->create();
        \App\Models\Job::factory(30)->create();

        $categories = [
            'Administration and Management',
            'Animals and Environment',
            'Computing and ICT',
            'Construction and Building',
            'Design and Arts',
            'Education and Training',
            'Engineering',
            'Financial Services',
            'Facilities and Property Services',
            'Healthcare',
            'Manufacturing and Production',
            'Transport and Logistics'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Hello12345'),
            'email_verified_at' => NOW()

        ]);

        $admin->roles()->attach($adminRole);
    }


}
