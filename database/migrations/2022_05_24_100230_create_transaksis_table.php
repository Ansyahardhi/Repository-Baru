<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');

            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();

            $table->string('kurir')->nullable();

            $table->string('pembayaran')->default('MIDTRANS');
            $table->string('pembayaran_url')->nullable(); //jika pembayran bukan MIDTRANS maka bisa di kosongkan

            $table->bigInteger('total_harga')->default(0);
            $table->string('status')->default('PENDING');

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
        Schema::dropIfExists('transaksis');
    }
}
