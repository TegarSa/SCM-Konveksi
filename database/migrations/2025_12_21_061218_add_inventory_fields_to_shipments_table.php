<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shipments', function (Blueprint $table) {

            // Untuk tampilan tabel Daftar Pengiriman
            $table->enum('inventory_type', ['Masuk', 'Keluar'])
                  ->after('status');

            $table->string('product_name')
                  ->after('inventory_type');

            $table->integer('quantity')
                  ->after('product_name');

            $table->string('city')
                  ->after('destination');

            $table->string('armada')
                  ->after('city');
        });
    }

    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn([
                'inventory_type',
                'product_name',
                'quantity',
                'city',
                'armada',
            ]);
        });
    }
};
