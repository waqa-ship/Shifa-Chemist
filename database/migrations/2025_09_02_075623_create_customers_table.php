<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('name', 120);
        $table->string('email')->nullable()->unique();
        $table->string('phone', 30)->nullable();
        $table->text('address')->nullable();
        $table->date('dob')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
