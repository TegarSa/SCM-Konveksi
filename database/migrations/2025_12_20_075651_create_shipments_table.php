<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('po_id')
                ->constrained('purchase_orders')
                ->cascadeOnDelete();

            $table->string('shipment_number')->unique();
            $table->date('shipment_date');

            $table->string('destination');
            $table->string('status')->default('pending');
            // pending | on_delivery | delivered | canceled

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
