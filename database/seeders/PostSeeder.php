<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $roles=['admin','user','visitor']; 
       $posts=[];
       $user_id=1;

       foreach($roles as $role){
          $posts[]=[
             'user_id'=>$user_id++,
             'title'=>"Post do $role",
             'content'=>"Conteudo do post do $role",
             'created_at'=>now(),
             'updated_at'=>now()
          ];
       }

         DB::table('posts')->insert($posts);


    }
}
