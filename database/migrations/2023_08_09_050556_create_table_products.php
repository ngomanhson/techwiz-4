<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->integer('product_category_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->decimal('price', 14,2);
            $table->integer('qty');
            $table->decimal('discount',14,2)->nullable();
            $table->double('weight')->nullable();
            $table->string('sku')->unique();
            $table->string('species')->nullable();
            $table->boolean('featured');
            $table->string("slug")->unique();
            $table->float("rate");
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
