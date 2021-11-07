<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->decimal('amount', 65, 8);
            $table->decimal('balance', 65, 8);
            $table->decimal('price', 65, 4);
            $table->decimal('min', 65, 8);
            $table->string('coin');
            $table->string('currency');
            $table->string('address');
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
        Schema::dropIfExists('buyers');
    }
}
