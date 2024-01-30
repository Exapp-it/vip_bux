<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('user_profiles', function (Blueprint $table) {
      $table->boolean('email_verified')->default(false);
      $table->boolean('phone_verified')->default(false);
      $table->boolean('telegram_verified')->default(false);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    //
  }
};
