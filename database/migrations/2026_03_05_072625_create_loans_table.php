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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('loan_type_id')->constrained()->cascadeOnDelete();

            $table->decimal('loan_amount',15,2);
            $table->decimal('interest_rate',5,2);

            $table->integer('duration_months');
            $table->decimal('processing_fee',10,2)->default(0);
            $table->decimal('total_amount',15,2);
            $table->decimal('monthly_payment',15,2);

            $table->enum('status',[
                'pending',
                'approved',
                'rejected',
                'active',
                'completed'
            ])->default('pending');

            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
