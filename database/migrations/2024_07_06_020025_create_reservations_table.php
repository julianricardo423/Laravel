<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\UserRolEnum;
use App\Enums\LaboratoriesEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('idNumber');

            $table->enum('userType', UserRolEnum::values());
            $table->enum('roomLaboratory', LaboratoriesEnum::values());

            $table->string('dependecyOrAcademyProgram');
            $table->date('dateReservation');
            $table->time('startHour');
            $table->time('endHour');

            $table->string('comments');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
