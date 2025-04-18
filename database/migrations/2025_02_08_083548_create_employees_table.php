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
        Schema::create('employees', function (Blueprint $table) {
            $table->string("employeeno");
            $table->string("name");
            $table->integer("sex");
            $table->string("mobile");
            $table->date("birthday");
            $table->integer("city_id");
            $table->integer("district_id");
            $table->string("street");
            $table->string("emergencycontactname")->nullable();
            $table->string("emergencycontactphone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
