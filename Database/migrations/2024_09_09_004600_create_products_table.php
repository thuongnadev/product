<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')
                  ->primary();
            $table->string('name');
            $table->string('slug')
                  ->unique();
            $table->string('sku')
                  ->unique()
                  ->nullable();
            $table->string('barcode')
                  ->unique()
                  ->nullable();
            $table->string('type')
                  ->default('simple');
            $table->text('description')
                  ->nullable();
            $table->text('short_description')
                  ->nullable();
            $table->decimal('price', 15, 2)
                  ->default(0)
                  ->nullable();
            $table->decimal('discount', 15, 2)
                  ->default(0)
                  ->nullable();
            $table->decimal('vat', 5, 2)
                  ->default(0)
                  ->nullable();
            $table->decimal('weight', 10, 2)
                  ->nullable();
            $table->decimal('length', 10, 2)
                  ->nullable();
            $table->decimal('width', 10, 2)
                  ->nullable();
            $table->decimal('height', 10, 2)
                  ->nullable();
            $table->boolean('is_in_stock')
                  ->default(true);
            $table->boolean('is_activated')
                  ->default(true);
            $table->boolean('is_shipped')
                  ->default(true);
            $table->boolean('is_trend')
                  ->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
