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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('slogan',190)->nullable();
            $table->text('description')->nullable();
            $table->string('logo',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('email',50)->nullable();
            $table->string('website',100)->nullable();
            $table->string('facebook',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('linkedin',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->text('mission',100)->nullable();
            $table->text('vision',100)->nullable();
            $table->string('video_url',190)->nullable();
            $table->text('map_embed')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
