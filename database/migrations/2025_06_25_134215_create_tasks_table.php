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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->enum('priority', ['high', 'medium', 'low'])->default('medium');
            $table->boolean('status')->default(false); // false = belum selesai, true = selesai
            $table->dateTime('reminder_at')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->enum('recurring_type', ['daily', 'weekly'])->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
