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
    Schema::create('user_wallets', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->decimal('balance', 8, 2)->default(0);
      $table->string('account');
      $table->decimal('withdrawal_limit', 8, 0)->nullable();

      $table->index('user_id');
      $table->index('account');

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
    Schema::dropIfExists('user_wallets');
  }
};
