<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id');
            $table->string('address');
            $table->string('public');
            $table->string('private');
            $table->string('wif');
            $table->string('coin');
            $table->boolean('status');
            $table->decimal('amt', 65, 8);
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
        Schema::dropIfExists('deposits');
    }
}
