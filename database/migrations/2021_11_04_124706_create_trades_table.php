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
            $table->boolean('status')->default(0); //from 1 to 4; 3 = sent, 4 = network_confirmed 5 = issue
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
