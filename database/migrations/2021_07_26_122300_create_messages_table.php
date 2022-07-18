<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->string('message_file')->nullable();
            $table->tinyInteger('read_bit')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->foreignId('conversation_id')->default(1)->nullable()->constrained()->onDelete('set null');
            $table->foreignId('receiver_id')->default(1)->nullable()->constrained()->onDelete('set null');
            $table->foreignId('sender_id')->default(1)->nullable()->constrained()->onDelete('set null');
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
        Schema::dropIfExists('messages');
    }
}
