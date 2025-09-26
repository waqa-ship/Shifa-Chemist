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
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');

            $table->string('name');         // Product Name
            $table->decimal('mrp', 10, 2);  // MRP
            $table->integer('qty');         // Quantity
            $table->decimal('rate', 10, 2); // Rate
            $table->decimal('total', 10, 2);
            $table->decimal('disc', 10, 2)->default(0);
            $table->decimal('tax_amt', 10, 2)->nullable();
            $table->decimal('cgst', 10, 2)->nullable();
            $table->decimal('sgst', 10, 2)->nullable();
            $table->decimal('total_amt', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_items');
    }
};
