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
            $table->string('shope_name', 250);
            $table->string('email', 150)->nullable();
            $table->string('password');
            $table->string('confirm_password', 250);
            $table->string('cnic_no');
            $table->string('cnic');
            $table->string('bank_check');
            $table->string('bank_name', 250);
            $table->string('account_title');
            $table->string('account_no');
            $table->string('delivery_type');
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
