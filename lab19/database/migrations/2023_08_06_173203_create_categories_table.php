<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('creator_id')->nullable();
        $table->timestamps();
    });
    Schema::table('categories', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable();

        // Add foreign key constraint to link the user_id with the id column of the users table
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
