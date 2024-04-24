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
        Schema::create('vaccancies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable(false);
            $table->string('job_name')->nullable(false);
            $table->string('position')->nullable(false);
            $table->string('salary')->nullable(false);
            $table->string('welfare')->nullable();
            $table->text('description')->nullable();
            $table->string('thumnails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccancies');
    }
};
