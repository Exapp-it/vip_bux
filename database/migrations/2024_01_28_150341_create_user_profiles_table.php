<?php

use App\Enums\UserGender;
use App\Enums\UserOccupation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('user_profiles', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->string('name')->nullable();
      $table->string('lastname')->nullable();
      $table->date('birthday')->nullable();
      $table->enum('gender', UserGender::values())->nullable();
      $table->enum('occupation', UserOccupation::values())->nullable();
      $table->string('country')->nullable();
      $table->string('region')->nullable();
      $table->string('city')->nullable();

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_profiles');
  }
};
