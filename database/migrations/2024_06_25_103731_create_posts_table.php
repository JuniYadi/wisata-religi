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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->index();
            $table->string('category')->index();
            $table->string('alamat');
            $table->string('google_maps');
            $table->string('biaya');
            $table->string('buka');
            $table->string('deskripsi');
            $table->string('summary');
            $table->string('agama')->index();
            $table->string('banner');
            $table->boolean('isPublish')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
