<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->boolean('phone_verified')->default(FALSE);
            $table->string('store_name')->unique();
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->BigInteger('wilaya_id');
            $table->string('type');
            $table->string('dayra')->nullable();
            $table->string('baladia')->nullable();
            $table->text('address')->nullable();
            $table->text('id_card_front_photo')->nullable();
            $table->text('id_card_back_photo')->nullable();
            $table->text('suplier_with_id_card_photo')->nullable();
            $table->text('register_commercial_number')->nullable();
            $table->text('persenal_ccp')->nullable();
            $table->text('commercial_ccp')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('last_seen')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('suppliers');
    }
}
