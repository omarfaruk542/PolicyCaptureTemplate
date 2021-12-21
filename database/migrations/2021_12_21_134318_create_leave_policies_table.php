<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->integer('has_policy')->nullable();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('alloc_days')->nullable();
            $table->string('days_after')->nullable();
            $table->string('credit_type')->nullable();
            $table->string('calc_basis')->nullable();
            $table->string('calc_type')->nullable();
            $table->integer('is_prorate')->nullable();
            $table->string('conse_limit')->nullable();
            $table->string('carry_forward')->nullable();
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
        Schema::dropIfExists('leave_policies');
    }
}
