<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('galeris', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan jika ada
            if (Schema::hasColumn('galeris', 'judul')) {
                $table->dropColumn('judul');
            }
            if (Schema::hasColumn('galeris', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }

            // Tambahkan kolom baru jika belum ada
            if (!Schema::hasColumn('galeris', 'nama')) {
                $table->string('nama');
            }
            if (!Schema::hasColumn('galeris', 'kategori_id')) {
                $table->unsignedBigInteger('kategori_id')->nullable();
                $table->foreign('kategori_id')
                      ->references('id')
                      ->on('kategoris')
                      ->onDelete('set null');
            }
            if (!Schema::hasColumn('galeris', 'foto')) {
                $table->string('foto')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('galeris', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu jika ada
            if (Schema::hasColumn('galeris', 'kategori_id')) {
                $table->dropForeign(['kategori_id']);
            }

            // Hapus kolom yang baru ditambahkan jika ada
            if (Schema::hasColumn('galeris', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('galeris', 'kategori_id')) {
                $table->dropColumn('kategori_id');
            }
            if (Schema::hasColumn('galeris', 'foto')) {
                $table->dropColumn('foto');
            }

            // Tambahkan kembali kolom lama jika diperlukan
            if (!Schema::hasColumn('galeris', 'judul')) {
                $table->string('judul');
            }
            if (!Schema::hasColumn('galeris', 'deskripsi')) {
                $table->text('deskripsi');
            }
        });
    }
};