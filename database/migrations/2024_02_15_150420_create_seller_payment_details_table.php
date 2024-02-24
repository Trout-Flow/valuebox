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
        Schema::create('seller_payment_details', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('account_title', 250);
            $table->string('iban_number', 250);
            $table->string('bank_check')->nullable();
            $table->integer('seller_id')->unsigned();
            $table->integer('bank_id')->unsigned();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')
            ->on('sellers')
            ->onDelete('cascade');


            $table->foreign('bank_id')->references('id')
            ->on('banks')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_payment_details');
    }
};
