<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',
            function (Blueprint $table) {
                $table->id();
                //start new order data
                $table->string('phone_no')->nullable();
                $table->string('order_no')->nullable();
                $table->string('product_name')->nullable();
                $table->enum('type_order', ['Refund', 'Exchange','Cancel','Edit'])->nullable();
                $table->enum('order_journey',['0','1','2','3','4'])->nullable();
                $table->text('note_tech')->nullable();
                $table->string('track')->nullable();
                $table->string('added_by')->nullable();

                $table->text('attachments')->nullable();

                //:end new order data!


                //start-tracking
                //exchange order
                $table->string('alternative_product')->nullable();
                $table->enum('order_arrived',['yes','no'])->nullable();
                $table->enum('send_alternative',['yes','no'])->nullable();
                //refund
                $table->text('bank_accounts')->nullable();
                $table->string('policy_attachment')->nullable();
                $table->enum('amount_transferred',['yes','no'])->nullable();
                //cancel
                $table->enum('done_cancel',['yes','no'])->nullable();
                //Edit
                $table->enum('done_valdiff',['yes','no'])->nullable();

                //:end Tracking!

                //start preview
                $table->string('decision_taken')->nullable();
                $table->text('note_warehouse')->nullable();
                $table->text('note_salah')->nullable();
                //end preview
                $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
