<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('corporate_name')->nullable()->unique();
            $table->string('fantasy_name')->nullable();
            $table->string('cpf_cnpj')->nullable()->unique();
            $table->string('buyer')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('shipping_company_id')->nullable();
            $table->foreign('shipping_company_id')->references('id')->on('shipping_companies')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('clients');
    }
}

