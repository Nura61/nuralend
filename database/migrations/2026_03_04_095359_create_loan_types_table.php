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
        Schema::create('loan_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();

            $table->decimal('interest_rate',5,2); //eg 12.50%
            $table->decimal('min_amount',15,2);
            $table->decimal('max-amount',15,2);

            $table->integer('min_duration'); //months
            $table->integer('mix_duration'); //months

            $table->decimal('processing_fee',8,2)->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_types');
    }
};
