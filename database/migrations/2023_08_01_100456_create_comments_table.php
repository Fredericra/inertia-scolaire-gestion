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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("notif_id")->on("notif")->reference("id")->oneDelete("cascade")->nullable();
            $table->foreignId("page_pub_id")->on("page_pubs")->reference("id")->oneDelete("cascade")->nullable();
            $table->longText("commentaire_page")->nullable();
            $table->longText("commentaire")->nullable();
            $table->foreignId("admin_id")->on("admins")->reference("id")->oneDelete("cascade");
            $table->integer("favori")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
