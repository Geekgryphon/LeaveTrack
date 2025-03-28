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
        Schema::create('leaveformsigndetails', function (Blueprint $table) {
            $table->id();
            $table->string('leaveform_no');
            $table->string('employee_id');
            $table->string('sign_result');
            $table->integer('sign_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaveformsigndetails');
    }
};
