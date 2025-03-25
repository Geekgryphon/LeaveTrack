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
        Schema::create('clockinouts', function (Blueprint $table) {
            $table->string('employee_id');
            $table->datetime('clockintime');
            $table->datetime('clockouttime');
            $table->boolean('isdelay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clockinouts');
    }
};
