


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
        Schema::create('legal_administrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directions_of_expenses_id')->constrained('directions_of_expenses')->onDelete('cascade');
            $table->string('Deadline')->nullable();
            $table->string('Performance_information')->nullable();
            $table->integer('Total_agreed')->nullable();
            $table->integer('21_agree')->nullable();
            $table->integer('22_agree')->nullable();
            $table->integer('23_agree')->nullable();
            $table->integer('Total_remaining_on_the_roadmap')->nullable();
            $table->integer('31_agree')->nullable();
            $table->integer('32_agree')->nullable();
            $table->integer('33_agree')->nullable();
            $table->string('Procurement_method')->nullable();
            $table->string('Start_of_conduct')->nullable();
            $table->string('Results_of_competitive_procedures')->nullable();
            $table->integer('Contract_amount_thousand_rubles')->nullable();
            $table->string('Contract_number')->nullable();
            $table->string('Contract_conclusion_date')->nullable();
            $table->string('Responsible_person')->nullable();
            $table->string('Supplier')->nullable();
            $table->integer('Planned_contract_amount')->nullable();
            $table->integer('Savings')->nullable();
            $table->string('Delivery_date_according_to_the_contract')->nullable();
            $table->string('Actual_delivery_date')->nullable();
            $table->string('Payment_date_under_the_contract')->nullable();
            $table->string('Actual_payment_date')->nullable();
            $table->integer('Accumulative_payment_amount')->nullable();
            $table->string('Information_on_non_fulfillment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_administrations');
    }
};
