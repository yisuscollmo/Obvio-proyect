<?php

namespace Database\Seeders;

use App\Http\Controllers\images as ControllersImages;
use App\Models\Article;
use App\Models\Buys_cont;
use App\Models\Buyscont;
use App\Models\Categorie;
use App\Models\detail;
use App\Models\images;
use App\Models\Income_conts;
use App\Models\incomes;
use App\Models\Provider;
use App\Models\Role;
use App\Models\sales;
use App\Models\sales_details;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Role::factory(2)->create();
        Role::insert([
            [
                //id: 1
                'name' => 'Administrator',
                'description' => 'User with all application privileges',
             
            ],
        ]);
        Categorie::factory(5)->create();
        Provider::factory(10)->create();
        Article::factory(100)->create();
        incomes::factory(10)->create();
        Income_conts::factory(10)->create();
        User::factory(10)->create();
        User::insert(
            [
                'roles_id' =>  3, //admin role id
                'name' =>  'Yisas', //default name
                'email' => 'jesuscolla14@gmail.com', //default email
                'email_verified_at' => date("Y/m/d"), //verified today
                'created_at' => date("Y/m/d"), //created today
                'password' => Hash::make('yisas123'), //default admin password: admin123
                'image' => 'https://w7.pngwing.com/pngs/223/244/png-transparent-computer-icons-avatar-user-profile-avatar-heroes-rectangle-black.png',
            
            ]
        );
      
        detail::factory(10)->create(); 
        Sales::factory(10)->create();
        sales_details::factory(10)->create();
        images::factory(10)->create();

    }
}
