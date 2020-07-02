<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('currency')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('wholesale_price');
            $table->float('retail_price');
            $table->integer('quantity');
            $table->integer('threshold')->nullable();
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('big_quantity')->nullable();
            $table->integer('remaining_quantity')->nullable();
            $table->integer('entries')->nullable();
            $table->integer('total')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('losses')->nullable();
            $table->integer('finals')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
