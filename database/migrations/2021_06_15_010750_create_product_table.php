<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('mfg_date', 50);
            $table->string('exp_date', 50);
            $table->integer('quantity');
            $table->integer('sell_price');
            $table->integer('supplier_price');
            $table->string('model', 100);
            $table->string('sku', 100);
            $table->string('img', 150)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('product_category_id')
                ->nullable()
                ->constrained('product_category')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('supplier_id')
                ->constrained('supplier')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('warehouse_id')
                ->nullable()
                ->constrained('warehouse')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
