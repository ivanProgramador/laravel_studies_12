<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //tabela principal qque contem os dados do usuario

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',100)->unique();
            $table->string('password',200);
            $table->string('role',20);
            $table->timestamps();
            $table->softDeletes();
        });

        //tabela que contem as permissoes do usuario
        //um usuario pode ter varias permissoes
        //e sera ligado a permissão atraves do user_id
        
        Schema::create('users_permissions',function(Blueprint $table){
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('permission',50);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_permissions');
        Schema::dropIfExists('users');
    }
};