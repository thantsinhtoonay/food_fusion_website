<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(){
    Schema::create('resources', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->enum('type',['recipe_card','tutorial','infographic','educational_pdf']);
      $table->string('file_path')->nullable();
      $table->text('description')->nullable();
      $table->timestamps();
    });
  }
  public function down(){ Schema::dropIfExists('resources'); }
};
