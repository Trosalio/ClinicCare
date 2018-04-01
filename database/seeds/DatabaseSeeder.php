<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role must comes before User seeder
        // as User seeder will use the roles to create.
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
