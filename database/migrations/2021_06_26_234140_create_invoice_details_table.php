<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->integer('available_qty');
            $table->integer('entered_qty');
            $table->integer('rate');
            $table->integer('discount')->nullable();
            $table->integer('total');
            $table->timestamps();
            $table->foreignId('product_id')->constrained('product');
            $table->foreignId('invoice_id')->constrained('invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }
}
