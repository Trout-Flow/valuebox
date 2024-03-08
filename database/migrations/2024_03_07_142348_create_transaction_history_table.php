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
        Schema::create('transaction_history', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date', 250);
            $table->double('debit', 150);
            $table->double('credit', 250);
            $table->string('status')->default('pending')->nullable();
            $table->string('transaction_no', 250);
            $table->string('remarks')->nullable();
            $table->integer('seller_id')->unsigned();
            $table->integer('payment_detail_id')->unsigned();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');

            $table->foreign('payment_detail_id')->references('id')->on('seller_payment_details')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_history');
    }
};
