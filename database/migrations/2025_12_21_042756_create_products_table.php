<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('sku')->unique();
            $table->foreignId('supplier_id')
                ->nullable()
                ->constrained('suppliers')
                ->onDelete('set null');
            $table->integer('initial_stock')->default(0);
            $table->integer('stock_in')->default(0);
            $table->integer('stock_out')->default(0);
            $table->integer('stock_remaining')->default(0);
            $table->string('unit')->nullable();
            $table->decimal('price_per_unit', 15, 2)->default(0);
            $table->decimal('total_price', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
