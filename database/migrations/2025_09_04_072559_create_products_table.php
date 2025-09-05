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
            $table->id(); // Primary Key (Number)
            $table->string('barcode')->unique()->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('discount', 5, 2)->default(0);
            $table->integer('quantity_in_stock')->default(0);
            $table->integer('minimum_stock_alert')->default(5);

            // Dates
            $table->date('manufacture_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('added_date')->useCurrent();

            // Other Details
            $table->string('storage_requirements')->nullable();
            $table->boolean('prescription_required')->default(false);
            $table->string('product_image')->nullable();
            $table->text('description')->nullable();
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
