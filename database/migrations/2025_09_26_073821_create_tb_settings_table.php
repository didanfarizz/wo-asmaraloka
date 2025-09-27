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
        Schema::create('tb_settings', function (Blueprint $table) {
            $table->integer('setting_id', false, true)->length(11)->autoIncrement(); // ubah dari order_id
            $table->string('phone_number', 256);
            $table->string('email', 80);
            $table->text('address')->nullable();
            $table->string('instagram_url', 256)->nullable();
            $table->string('whatsapp_url', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_settings');
    }
};
