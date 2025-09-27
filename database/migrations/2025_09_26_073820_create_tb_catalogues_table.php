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
        Schema::create('tb_catalogues', function (Blueprint $table) {
            $table->integer('catalogue_id', false, true)->length(11)->autoIncrement();
            $table->string('image', 100);
            $table->string('package_name', 256);
            $table->text('description')->nullable();
            $table->integer('price');
            $table->enum('status_publish', ['Y', 'N'])->default('N');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('tb_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_catalogues');
    }
};
