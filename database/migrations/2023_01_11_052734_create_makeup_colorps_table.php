<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makeup_colorps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->integer('costing');
            $table->integer('unitPrice');
            $table->integer('stock');
            $table->text('image')->nullable();

            $table->unsignedBigInteger('makeup_product_id')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('makeup_product_id')->references('id')->on('makeup_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makeup_colorps');
    }
};
