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
        Schema::create('favoris', function (Blueprint $table) {
            $table->id();
            $table->boolean("suivre")->nullable();
            $table->foreignId("admin_id")->reference("id")->on("admins")->oneDelete("cascade")->nullable();
            $table->foreignId("notif_id")->reference("id")->on("notifs")->oneDelete("cascade")->nullable();
            $table->foreignId("page_pub_id")->reference("id")->on("page_pubs")->oneDelete("cascade")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoris');
    }
};
