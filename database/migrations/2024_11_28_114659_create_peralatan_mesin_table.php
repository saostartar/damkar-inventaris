<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeralatanMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peralatan_mesin', function (Blueprint $table) {
            $table->id();
            $table->string('register', 50); // Register number/code
            $table->string('kode_barang', 50); // Item code
            $table->string('nama_barang', 255); // Item name/type
            $table->string('merk_type', 255);
            $table->string('ukuran_cc', 50)->nullable();
            $table->string('bahan', 255)->nullable();
            $table->string('pabrik', 255)->nullable();
            $table->string('rangka', 255)->nullable();
            $table->string('mesin', 255)->nullable();
            $table->string('polisi', 50)->nullable();
            $table->string('bpkb', 50)->nullable();
            $table->integer('tahun_pengadaan')->nullable(); // Year of purchase
            $table->string('asal_usul', 255)->nullable(); // Origin
            $table->decimal('harga', 15, 2)->nullable(); // Price with 2 decimal places
            $table->text('keterangan')->nullable(); // Description
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
        Schema::dropIfExists('peralatan_mesin');
    }
}