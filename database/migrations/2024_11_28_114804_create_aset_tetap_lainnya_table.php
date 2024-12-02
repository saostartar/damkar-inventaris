<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetTetapLainnyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_tetap_lainnya', function (Blueprint $table) {
            $table->id();
            $table->string('register', 50); // Register number/code
            $table->string('kode_barang', 50); // Item code
            $table->string('nama_barang', 255); // Item name/type
            $table->text('judul_pencipta')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('asal_daerah', 255)->nullable();
            $table->string('pencipta', 255)->nullable();
            $table->string('bahan', 255)->nullable();
            $table->string('jenis', 255)->nullable();
            $table->string('ukuran', 50)->nullable();
            $table->integer('jumlah');
            $table->year('tahun_cetak')->nullable();
            $table->string('asal_usul', 255)->nullable(); // Origin
            $table->decimal('harga', 15, 2)->nullable(); // Price with 2 decimal places
            $table->text('keterangan')->nullable(); // Additional notes/description
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
        Schema::dropIfExists('aset_tetap_lainnya');
    }
}