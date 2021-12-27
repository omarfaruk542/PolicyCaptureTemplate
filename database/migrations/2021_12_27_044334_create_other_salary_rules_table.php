<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherSalaryRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_salary_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->integer('has_policy')->nullable();
            $table->string('rule_name')->nullable();
            $table->string('condition')->nullable();
            $table->string('day_status')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('other_salary_rules');
    }
}
