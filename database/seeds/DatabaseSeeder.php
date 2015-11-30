<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
				DB::table('users')->delete();
				\App\User::create(['name' => 'zhaoxiaolong', 'email' => '99866770@qq.com', 'password' => \Hash::make('123456')]);
				
        Model::reguard();
    }
}
