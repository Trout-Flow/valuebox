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
        Schema::create('seller_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->string('address', 250);
            $table->string('vacation_mode');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('seller_id');
            $table->integer('country_id');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->integer('area_id');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')
            ->on('sellers')
            ->onDelete('cascade');


            $table->foreign('country_id')->references('id')
            ->on('countries')
            ->onDelete('cascade');

            $table->foreign('province_id')->references('id')
            ->on('provinces')
            ->onDelete('cascade');

            $table->foreign('city_id')->references('id')
            ->on('cities')
            ->onDelete('cascade');

            $table->foreign('area_id')->references('id')
            ->on('areas')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_stores');
    }
};
