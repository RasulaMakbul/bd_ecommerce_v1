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
        Schema::create('makeup_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->string('shortDefination')->nullable();
            $table->longText('description');
            $table->longText('test');
            $table->longText('result');
            $table->longText('howToUse');
            $table->longText('pack');
            $table->longText('ingredient');
            $table->string('weight');
            $table->string('pao');
            $table->string('origin');
            $table->text('images')->nullable();
            $table->boolean('is_active')->default(false);


            $table->unsignedBigInteger('makeup_id')->nullable();
            $table->unsignedBigInteger('makeup_sub_category_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('makeup_id')->references('id')->on('makeups')->onDelete('cascade');
            $table->foreign('makeup_sub_category_id')->references('id')->on('makeup_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makeup_products');
    }
};
