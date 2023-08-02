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
        Schema::create('mpianatras', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->string("sexe");
            $table->integer("matricule");
            $table->longText("description");
            $table->string("img")->nullable();
            $table->integer("niveau");
            $table->integer("filiere");
            $table->foreignId("admin_id")->reference("id")->on("admins")->onDelete("cascade")->nullable();
            $table->foreignId("note_id")->reference("id")->on("notes")->onDelete("cascade")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpianatras');
    }
};
