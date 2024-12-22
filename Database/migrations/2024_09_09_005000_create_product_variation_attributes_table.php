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
        Schema::create('product_variation_attributes', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->uuid('product_variation_id');
            $table->uuid('variation_attribute_id');
            $table->uuid('variation_attribute_value_id');
            $table->timestamps();

            $table->foreign('product_variation_id', 'pva_variation_fk')
                ->references('id')
                ->on('product_variations')
                ->onDelete('cascade');

            $table->foreign('variation_attribute_id', 'pva_attribute_fk')
                ->references('id')
                ->on('variation_attributes')
                ->onDelete('cascade');

            $table->foreign('variation_attribute_value_id', 'pva_value_fk')
                ->references('id')
                ->on('variation_attribute_values')
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
        Schema::dropIfExists('product_variation_attributes');
    }
};
