<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('galeris', function (Blueprint $table) {
            // Tambahkan kolom foto jika belum ada
            if (!Schema::hasColumn('galeris', 'foto')) {
                $table->string('foto')->nullable()->after('kategori_id');
            }

            // Jika perlu mengubah tipe data atau constraint lainnya
            // Contoh:
            // $table->string('nama')->change();
            // $table->foreignId('kategori_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('galeris', function (Blueprint $table) {
            // Hapus kolom foto jika ada
            if (Schema::hasColumn('galeris', 'foto')) {
                $table->dropColumn('foto');
            }
        });
    }
};