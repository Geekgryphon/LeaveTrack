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
        Schema::create('leaveformdetails', function (Blueprint $table) {
            $table->id();
            $table->string("leaveform_no");
            $table->datetime("begintime");
            $table->datetime("enddatetime");
            $table->integer("hours");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaveformdetails');
    }
};
