<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('buyer')->nullable();
            $table->bigInteger('seller')->nullable();
            $table->string('coin');
            $table->decimal('amount', 65, 8);
            $table->string('buyer_address');
            $table->string('bank_name');
            $table->string('bank_account_name');
            $table->string('bank_account_number');
            $table->decimal('price', 65,2);
            $table->boolean('status')->default(0); //1 = buyer paid, 2 = seller confirmed, 3 = sent, 4 = confirmed
            $table->string('trx_hash', 500)->nullable();
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
        Schema::dropIfExists('trades');
    }
}
