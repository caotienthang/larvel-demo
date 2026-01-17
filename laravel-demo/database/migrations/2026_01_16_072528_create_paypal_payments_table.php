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
        Schema::create('paypal_payments', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();

            // PayPal identifiers
            $table->string('paypal_order_id')->unique();
            $table->string('paypal_capture_id')->nullable()->unique();

            // Payment info
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('USD');

            // PayPal payer
            $table->string('payer_email')->nullable();
            $table->string('payer_id')->nullable();

            // Status
            $table->string('status', 30)->default('CREATED');
            // CREATED | COMPLETED | FAILED | CANCELED

            // Raw PayPal response
            $table->json('raw_response')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['invoice_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_payments');
    }
};
