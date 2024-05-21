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
      Schema::create('statements', function (Blueprint $table) {
        $table->id();
        $table->string('user_fullname');
        $table->string('user_email');
        $table->string('user_tel');
        $table->string('car_number');
        $table->string('description');
        $table->string('status');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('statements');
    }
};
