<?php

use App\Enums\UserRoles;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('login');
      $table->string('email')->unique();
      $table->integer('pin_code')->nullable();
      $table->string('auth_code')->nullable();
      $table->boolean('active')->default(true);
      $table->enum('role', [UserRoles::Admin, UserRoles::User, UserRoles::Manager, UserRoles::Moderator])->default(UserRoles::User);
      $table->ipAddress('ip')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();

      $table->index('login');
      $table->index('email');
      $table->index('role');
      

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
