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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string("image")->nullable();
            $table->string("image_page")->nullable();
            $table->string('url');
            $table->foreignId("notifs_id")->reference("id")->on("notifs")->oneDelete("cascade")->nullable();
            $table->foreignId("page_pub_id")->reference("id")->on("page_pubs")->oneDelete("cascade")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
