<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(){
    Schema::create('interactions', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
      $table->foreignId('recipe_id')->nullable()->constrained('recipes')->nullOnDelete();
      $table->enum('action',['view','like','favorite','comment'])->nullable();
      $table->text('meta')->nullable();
      $table->timestamps();
    });
  }
  public function down(){ Schema::dropIfExists('interactions'); }
};
