<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddSocAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_in_soc',20)
                ->default('')
                ->comment('id в соцсети');
            $table->enum('type_auth', ['site', 'vk', 'github'])
                ->default('site')
                ->comment('Тип используемой авторизации');
            $table->string('avatar', 250)->default('https://static8.depositphotos.com/1207999/1027/i/450/depositphotos_10275820-stock-photo-business-man-suit-avatar.jpg')->comment('Ссылка на аватар');
            $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_in_soc', 'type_auth' , 'avatar']);
        });
    }
}
