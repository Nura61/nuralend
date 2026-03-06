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
        Schema::create('loan_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->cascadeOnDelete();

            $table->integer('installment_number'); //1,2,3...
            $table->date('due_date');

            $table->decimal('amount_due',15,2);
            $table->decimal('amount_paid',15,2)->default(0);
            $table->enum('status',[
                'pending',
                'paid',
                'overdue'
            ])->default('pending');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_schedules');
    }
};
