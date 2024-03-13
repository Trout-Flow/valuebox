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
            $table->string('store_name', 250);
            $table->string('shope_contact_no');
            $table->string('address', 250)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('vacation_mode')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('seller_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('area_id')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

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
