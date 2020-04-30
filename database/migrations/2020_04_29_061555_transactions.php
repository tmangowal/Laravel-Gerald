<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('status');
            $table->integer('userPayment');
            $table->date('completedDate');
            $table->string('fullName');
            $table->string('address');
            $table->string('city');
            $table->string('district');
            $table->string('province');
            $table->integer('zip');
            $table->string('phone');
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
        Schema::dropIfExists(('transactions'));
    }
}
