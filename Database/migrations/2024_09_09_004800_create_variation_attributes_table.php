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
        Schema::create('variation_attributes', function (Blueprint $table) {
            $table->uuid('id')
                  ->primary();
            $table->string('name');
            $table->string('slug')
                  ->unique();
            $table->string('type')
                  ->default('select');
            $table->boolean('is_active')
                  ->default(true);
            $table->integer('display_order')
                  ->default(0);
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
        Schema::dropIfExists('variation_attributes');
    }
};
