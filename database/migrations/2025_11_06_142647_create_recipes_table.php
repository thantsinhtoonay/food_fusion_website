<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(){
    Schema::create('recipes', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
      $table->string('title');
      $table->string('cuisine')->nullable();
      $table->string('dietary')->nullable();
      $table->enum('difficulty',['easy','medium','hard'])->default('medium');
      $table->text('description')->nullable();
      $table->longText('ingredients')->nullable();
      $table->longText('instructions')->nullable();
      $table->string('image_path')->nullable();
      $table->boolean('featured')->default(false);
      $table->timestamps();
    });
  }
  public function down(){ Schema::dropIfExists('recipes'); }
};
