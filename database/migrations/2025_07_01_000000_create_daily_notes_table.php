<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daily_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('note_date'); // tanggal catatan
            $table->text('content');   // isi catatan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_notes');
    }
}; 