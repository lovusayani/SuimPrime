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
        Schema::table('payment_transactions', function (Blueprint $table) {
            // Drop existing unique constraint
            $table->dropUnique(['transaction_id']);
            // Add new unique constraint that allows NULL
            $table->unique('transaction_id', 'payment_transactions_transaction_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->dropUnique('payment_transactions_transaction_id_unique');
            $table->unique('transaction_id');
        });
    }
};
