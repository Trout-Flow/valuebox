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
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->string('email', 150)->nullable();
            $table->string('mobile_number', 250)->nullable();
            $table->string('password');
            $table->string('confirm_password', 250);
            $table->string('cnic_no');
            $table->string('cnic_front')->nullable();
            $table->string('logo')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('commision', 250)->nullable();;
            $table->string('delivery_type');
            $table->string('status')->default('pending')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
