<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lancamentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lancamentotable_id')->nullable();
            $table->string('lancamentotable_type')->nullable();
            $table->integer('forma_pagamento_id')->unsigned();
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos');
            $table->double('valor');
            $table->double('desconto')->default(0)->nullable();
            $table->date('data_do_pagamento')->nullable();
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
		Schema::drop('lancamentos');
	}

}
