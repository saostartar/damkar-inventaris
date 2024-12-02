<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah', function (Blueprint $table) {
            $table->id();
            // Common fields for all categories
            $table->string('register', 50); // Register number/code
            $table->string('kode_barang', 50); // Item code
            $table->string('nama_barang', 255); // Item name/type
            // Specific fields for tanah
            $table->decimal('luas_m2', 10, 2);
            $table->text('alamat');
            $table->string('hak', 255)->nullable();
            $table->date('tanggal_sertifikat')->nullable();
            $table->string('nomor_sertifikat', 255)->nullable();
            $table->string('penggunaan', 255)->nullable();
            $table->integer('tahun_pengadaan')->nullable(); // Year of procurement
            $table->string('asal_usul', 255)->nullable(); // Origin
            $table->decimal('harga', 15, 2)->nullable(); // Price with 2 decimal places
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('tanah');
    }
}