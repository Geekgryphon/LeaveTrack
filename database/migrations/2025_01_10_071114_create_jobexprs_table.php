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
        Schema::create('jobexprs', function (Blueprint $table) {
            $table->id();
            $table->string('jobtye');
            $table->string('employeeID');
            $table->date('begindate');
            $table->date('enddate');
            $table->integer('seq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobexprs');
    }
};
