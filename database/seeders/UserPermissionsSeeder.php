<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permissoes para o admin
        
        $permissions = [
            //permissoes para o admin
            [
                'user_id'=>1,
                'permission'=>'create_post'
            ],
            [
                'user_id'=>1,
                'permission'=>'update_post'
            ],
            [
                'user_id'=>1,
                'permission'=>'delete_post'
            ],
            //permissoes para usuario normal 
            [
                'user_id'=>2,
                'permission'=>'create_post'
            ],
            [
                'user_id'=>3,
                'permission'=>'create_post'
            ]
        ];

        foreach($permissions as $permission){
             $data=[
                'user_id'=>$permission['user_id'],
                'permission'=>$permission['permission'],
                'created_at'=>now(),
                'updated_at'=>now() 
             ];
             DB::table('users_permissions')->insert($data);
        }
    }
}
