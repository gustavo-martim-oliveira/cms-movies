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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->json('configuration');
            $table->integer('period')->default(1)->comment('Month quantity for generate a new charge');
            $table->double('value');

            $table->boolean('has_free_trial')->default(false)->comment('If has free trial');
            $table->integer('free_trial_days')->default(0)->comment('if has free trial, insert the days free');

            $table->boolean('has_new_user_discount')->default(false)->comment('Discount for new registered users');
            $table->enum('new_user_discount_type', ['value', 'percentage'])->nullable();
            $table->double('new_user_discount');

            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('plans');
    }
};
