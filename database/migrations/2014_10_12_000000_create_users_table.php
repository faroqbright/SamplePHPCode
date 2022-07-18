<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('user_type')->default('app_user');
            $table->text('image')->nullable();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('address')->nullable();
            $table->string('otp')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('social_token')->nullable();
            $table->string('social_media_type')->nullable();
            $table->foreignId('level_id')->default(1)->nullable()->constrained()->onDelete('set null');
            $table->integer('points')->default(0);
            $table->tinyInteger('is_daily_leader')->default(0);
            $table->text('device_token')->nullable();
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
}
