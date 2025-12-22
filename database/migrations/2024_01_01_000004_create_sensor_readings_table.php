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
        Schema::create('sensor_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->decimal('temperature', 5, 2)->comment('Suhu dalam derajat Celsius');
            $table->decimal('smoke_density', 5, 2)->comment('Kepekatan asap dalam ppm');
            $table->boolean('fire_detected')->default(false)->comment('Deteksi kebakaran berdasarkan suhu tidak wajar');
            $table->text('alert_message')->nullable();
            $table->string('status')->default('normal')->comment('normal, warning, danger');
            $table->timestamps();
            
            $table->index('room_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_readings');
    }
};

