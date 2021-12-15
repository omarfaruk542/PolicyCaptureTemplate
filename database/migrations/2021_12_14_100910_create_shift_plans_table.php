<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->string('shiftname')->nullable();
            $table->time('intime')->nullable();
            $table->time('outtime')->nullable();
            $table->time('whour')->nullable()->comment('whour=working hour');
            $table->time('lgrace')->nullable()->comment('lgrace=late grace');
            $table->time('eograce')->nullable()->comment('eograce=early out grace');
            $table->time('lout')->nullable()->comment('lout=lunch out');
            $table->time('lin')->nullable()->comment('lin=lunch in');
            $table->decimal('not',18,2)->nullable()->comment('not=normal ot');
            $table->decimal('eot',18,2)->nullable()->comment('eot=extra ot');
            $table->foreignId('added_by')->nullable()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('shift_plans');
    }
}
