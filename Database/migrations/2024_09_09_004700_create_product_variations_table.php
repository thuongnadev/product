<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up()
      {
            Schema::create("product_variations", function (Blueprint $table) {
                  $table->uuid("id")
                        ->primary();
                  $table->uuid("product_id");
                  $table->text('img');
                  $table->string("sku")
                        ->unique()
                        ->nullable();
                  $table->string('barcode')
                        ->unique()
                        ->nullable();
                  $table->decimal("price", 15, 2);
                  $table->decimal('discount', 15, 2)
                        ->default(0)
                        ->nullable();
                  $table->integer("stock_quantity")
                        ->default(0);
                  $table->boolean("is_activated")
                        ->default(true);
                  $table->timestamps();

                  $table->foreign("product_id")
                        ->references("id")
                        ->on("products")
                        ->onDelete("cascade");

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
            Schema::dropIfExists("product_variations");
      }
};
