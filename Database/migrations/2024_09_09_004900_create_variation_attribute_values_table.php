<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_attribute_values', function (Blueprint $table) {
            $table->uuid('id')
                  ->primary();
            $table->uuid('variation_attribute_id');
            $table->string('value');
            $table->string('slug')
                  ->unique();
            $table->integer('display_order')
                  ->default(0);
            $table->boolean('is_active')
                  ->default(true);
            $table->timestamps();

            $table->foreign('variation_attribute_id')
                  ->references('id')
                  ->on('variation_attributes')
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
        Schema::dropIfExists('variation_attribute_values');
    }
};
