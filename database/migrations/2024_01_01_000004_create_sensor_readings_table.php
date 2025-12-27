<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sensor_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->decimal('temperature', 5, 2);
            $table->decimal('smoke_density', 5, 2);
            $table->boolean('fire_detected')->default(false);
            $table->text('alert_message')->nullable();
            $table->string('status')->default('normal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensor_readings');
    }
};
