<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // bigint(20) UN AI PK
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('address', 255)->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('password', 255);
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
