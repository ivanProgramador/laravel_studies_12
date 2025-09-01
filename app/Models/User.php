<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    public function posts()
    {
        //estabelacendo uma relçao de um para amuitos com os post  
        return $this->hasMany(Post::class);
    }
}
