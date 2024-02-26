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
        Schema::create('assign_collecion_to_sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->string('name', 250);
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_collecion_to_sellers');
    }
};
