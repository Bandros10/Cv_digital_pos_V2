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
        Schema::create('orderitems', function (Blueprint $table) {
            $table->string('orderitem_id');
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('customer_name');
            $table->string('nama_product');
            $table->integer('order_Qty')->nullable();
            $table->string('price_Qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
