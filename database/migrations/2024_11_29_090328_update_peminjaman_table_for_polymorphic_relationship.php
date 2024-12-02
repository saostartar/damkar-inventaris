<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePeminjamanTableForPolymorphicRelationship extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            // Remove the existing 'barang_id' foreign key and column
            if (Schema::hasColumn('peminjaman', 'barang_id')) {
                $table->dropForeign(['barang_id']);
                $table->dropColumn('barang_id');
            }

            // Add polymorphic columns
            $table->unsignedBigInteger('borrowable_id')->nullable()->after('user_id');
            $table->string('borrowable_type')->nullable()->after('borrowable_id');

            // Optionally, add indexes for better performance
            $table->index(['borrowable_id', 'borrowable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            // Drop polymorphic columns
            $table->dropIndex(['borrowable_id', 'borrowable_type']);
            $table->dropColumn(['borrowable_id', 'borrowable_type']);

            // Re-add 'barang_id' if necessary
            $table->unsignedBigInteger('barang_id')->nullable()->after('user_id');
            $table->foreign('barang_id')->references('id')->on('barang_umum')->onDelete('cascade');
        });
    }
}