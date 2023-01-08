<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->mediumText('address')->nullable();
            $table->string('city',20)->nullable();
            $table->string('country',20)->nullable();
            $table->string('post_code',8)->nullable();
            $table->longText('about')->nullable();
            $table->string('avatar')->nullable();
            $table->string('user_type',11)->default('2');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
