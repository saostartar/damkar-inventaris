<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangunansTable extends Migration // Changed from CreateBuildingsTable
{
    public function up()
    {
        Schema::create('bangunans', function (Blueprint $table) { // Changed from 'buildings'
            $table->id();
            $table->string('register', 50); // Register number
            $table->string('kode_barang', 50); // Item code
            $table->string('nama_barang', 255); // Item name/type
            $table->enum('kondisi_bangunan', ['Baik', 'Kurang Baik', 'Rusak Berat'])->default('Baik');
            $table->boolean('bertingkat')->default(false);
            $table->boolean('beton')->default(false);
            $table->decimal('luas_lantai', 10, 2); // Floor area in M2
            $table->text('alamat'); // Location address
            $table->date('tanggal')->nullable();
            $table->string('nomor', 255)->nullable();
            $table->decimal('luas_m2', 10, 2); // Area in M2
            $table->string('status_tanah', 255)->nullable();
            $table->string('nomor_kode_tanah', 255)->nullable();
            $table->string('asal_usul', 255)->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bangunans'); // Changed from 'buildings'
    }
}