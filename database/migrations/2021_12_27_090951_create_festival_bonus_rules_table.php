<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalBonusRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_bonus_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->string('rule_name')->nullable();
            $table->string('condition')->nullable();
            $table->string('amount')->nullable();
            $table->integer('is_fixed')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('festival_bonus_rules');
    }
}
