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
        Schema::create('leaveforms', function (Blueprint $table) {
            $table->string('no');
            $table->string('employee_id');
            $table->string('signstage_id');
            $table->datetime('begintime');
            $table->datetime('endtime');
            $table->string('reason');
            $table->string('signstate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaveforms');
    }
};
