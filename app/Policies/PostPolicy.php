<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $Post): bool
    {
        return($user->role === 'admin'|| $user->id === $Post->user_id);
    }

    /**
     * determina quem pode criar os posts
     */
    public function create(User $user)
    {
       // if($user->role !== 'visitor'){
       //    return true;
       // }
       // return false;

       //consultando a permissão na base 
       //Aqui ele busca se existe uma permissão com esse nome associada a esse tipo de usuário
        
       // V1
       // return $user->permissions()->where('permission','create_post')->exists();

       //outra forma de chegar ao mesmo resultado 
        
       // V2
       // return $user->permissions->contains('permission','create_post');

       //outra forma de chegar ao mesmo resultado so que consultando o array de permissões do usuário 
       
       //V3 
       //  foreach($user->permissions as $permission){

       //   if($permission->permission === 'create_post'){
       //      return true;
       //   }
       //   return false;

       //Devolvendo algo além de true e false
       
       if($user->permissions->contains('permission','create_post')){
           return Response::allow();
       }else{
           return Response::denyWithStatus(403,'Você não tem essa permissão');
       }

    }


    /**
     * determina quam pode atualizar os posts.
     */
    public function update(User $user, Post $Post): bool
    {
        return $user->permissions->contains('permission','update_post');
    }

    /**
     * determina quam pode deletar os posts.
     */
    public function delete(User $user, Post $Post): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $Post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $Post): bool
    {
        return true;
    }
}
