<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_umum', function (Blueprint $table) {
            $table->id();
            $table->string('register', 50); // Register number/code
            $table->string('kode_barang', 50); // Item code
            $table->string('nama_barang', 255);
            $table->string('merk_type', 255)->nullable();
            $table->string('bahan', 255)->nullable();
            $table->string('ukuran_konstruksi', 50)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->enum('keadaan_barang', ['Baik', 'Kurang Baik', 'Rusak Berat'])->default('Baik');
            $table->integer('jumlah_barang');
            $table->string('no_sertifikat', 255)->nullable();
            $table->string('no_pabrik', 255)->nullable();
            $table->string('no_chasis', 255)->nullable();
            $table->string('no_mesin', 255)->nullable();
            $table->string('asal_usul', 255)->nullable(); // Origin of goods
            $table->integer('tahun_pengadaan')->nullable(); // Year of purchase
            $table->decimal('harga', 15, 2)->nullable(); // Price
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
        Schema::dropIfExists('barang_umum');
    }
}