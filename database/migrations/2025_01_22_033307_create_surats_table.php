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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('pejabat_id')->nullable();
            $table->text('Keterangan');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('pejabat_id')->references('id')->on('pejabats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
