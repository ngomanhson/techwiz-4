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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();

            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('qty');
            $table->string('size')->nullable();
            $table->decimal("amount",14,2);
            $table->decimal("total",14,2);
            $table->boolean("is_reviewed")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
