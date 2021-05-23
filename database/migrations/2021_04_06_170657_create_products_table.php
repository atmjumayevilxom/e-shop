<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_discription')->nullable();
            $table->text('discription');
            $table->decimal('regular_price');
            $table->decimal('sal_price')->nullable();;
            $table->string('SKU');
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->unsignedInteger('quantity')->default(10);
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
