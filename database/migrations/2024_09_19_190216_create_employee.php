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
        Schema::create('report_employee', function (Blueprint $table) {
            $table->id();
            $table->string(column:'surnmae');
            $table->string(column:'name');
            $table->string(column:'full_id_number');
            $table->string(column:'identification_number');
            $table->date(column:'date_birth')->nullable();
            $table->dateTime(column:'date_report')->nullable();
            $table->string(column:'gender');
            $table->string(column:'username');
            $table->string(column:'company_name');
            $table->string(column:'remarks')->nullable();
            $table->string(column:'involved_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_employee');
    }
};
