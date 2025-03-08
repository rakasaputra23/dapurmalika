<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('address')->nullable()->after('email'); // Alamat
            $table->string('birth_place')->nullable()->after('address'); // Tempat Lahir
            $table->date('birth_date')->nullable()->after('birth_place'); // Tanggal Lahir
        });
    }

    public function down() {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['address', 'birth_place', 'birth_date']);
        });
    }
};
