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
        Schema::create('makeup_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description', 900);

            $table->unsignedBigInteger('makeup_id');

            $table->boolean('is_active')->default(false);
            $table->string('images')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('makeup_id')->references('id')->on('makeups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makeup_sub_categories');
    }
};
