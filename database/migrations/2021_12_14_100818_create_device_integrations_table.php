<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_integrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('com_id')->references('id')->on('company_infos');
            $table->integer('is_upload')->comment('1=yes,0=no');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('device_integrations');
    }
}
