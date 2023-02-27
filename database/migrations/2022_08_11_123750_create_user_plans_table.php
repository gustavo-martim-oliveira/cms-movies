<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            //Payment Details
            $table->string('payment_getaway')->nullable();
            $table->double('payment_value')->nullable();
            $table->timestamp('payment_date')->nullable();

            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->boolean('active')->default(true);

            $table->timestamps();

            //History details of plan or user
            $table->text('history')->nullable()->comment('Only used when plan or user is deleted of database');

            //foreing
            $table->foreign('plan_id')
                    ->references('id')
                    ->on('plans')
                    ->onDelete('SET NULL');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_plans');
    }
};
