<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('birth_place')->nullable()->after('email'); // Tambahkan underscore
        });
    }

    public function down() {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('birth_place');
        });
    }
};
