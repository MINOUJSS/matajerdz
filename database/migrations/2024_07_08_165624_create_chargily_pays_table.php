<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargilyPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargily_pays', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullble()->default(NULL);
            $table->text('user_guard')->nullble()->default(NULL);
            $table->text('livemode')->nullble()->default(NULL);
            $table->text('checkout_id')->nullble()->default(NULL);
            $table->text('entity')->nullble()->default(NULL);
            $table->text('amount')->nullble()->default(NULL);
            $table->text('currency')->nullble()->default(NULL);
            $table->text('fees')->nullble()->default(NULL);
            $table->text('fees_on_merchant')->nullble()->default(NULL);
            $table->text('fees_on_customer')->nullble()->default(NULL);;
            $table->text('pass_fees_to_customer')->nullble()->default(NULL);
            $table->text('chargily_pay_fees_allocation')->nullble()->default(NULL);
            $table->text('status')->nullble()->default(NULL);
            $table->text('deposit_transaction_id')->nullble()->default(NULL);
            $table->text('locale')->nullble()->default(NULL);
            $table->text('description')->nullble()->default(NULL);
            $table->text('metadata')->nullble()->default(NULL);
            $table->text('success_url')->nullble()->default(NULL);
            $table->text('failure_url')->nullble()->default(NULL);
            $table->text('webhook_endpoint')->nullble()->default(NULL);
            $table->text('payment_method')->nullble()->default(NULL);
            $table->text('invoice_id')->nullble()->default(NULL);
            $table->text('customer_id')->nullble()->default(NULL);
            $table->text('payment_link_id')->nullble()->default(NULL);
            $table->text('shipping_address')->nullble()->default(NULL);
            $table->text('collect_shipping_address')->nullble()->default(NULL);
            $table->text('discount')->nullble()->default(NULL);
            $table->text('amount_without_discount')->nullble()->default(NULL);
            $table->text('checkout_url')->nullble()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chargily_pays');
    }
}
