<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTLDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TLDs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('register', 10, 2);
            $table->decimal('transfer', 10, 2);
            $table->decimal('renewal', 10, 2);
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
        Schema::dropIfExists('TLDs');
    }
}
