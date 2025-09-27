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
        Schema::create('tb_order', function (Blueprint $table) {
            $table->integer('order_id', false, true)->length(11)->autoIncrement();
            $table->unsignedInteger('catalogue_id');
            $table->string('name', 120);
            $table->string('email', 256);
            $table->string('phone_number', 30);
            $table->date('wedding_date');
            $table->enum('status', ['requested', 'approved'])->default('requested');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('catalogue_id')->references('catalogue_id')->on('tb_catalogues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_order');
    }
};
