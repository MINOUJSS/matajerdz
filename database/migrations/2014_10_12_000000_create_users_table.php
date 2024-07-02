<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->boolean('phone_verified')->default(FALSE);
            $table->string('password');
            $table->enum('type',['product_confirmateur','service_confirmateur','livreur','bloger','frontend_devloper','backend_devloper','service_suport','police','tex_verificateur','freelercer','customer']);
            $table->enum('status',['Active', 'Inactive'])->default('Active');
            $table->BigInteger('wilaya_id');
            $table->string('dayra')->nullable();
            $table->string('baladia')->nullable();
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
        Schema::dropIfExists('users');
    }
}
