<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("lname")->comment("Фамилия");
            $table->string("fname")->comment("Имя");
            $table->string("sname")->comment("Отчество");
            $table->string("email")->unique()->comment("Почта");
            $table->timestamp("email_verified_at")->nullable()->comment("Время верификации почты");
            $table->string('password')->comment("Пароль");
            $table->integer('rate_per_hour')->default(random_int(60, 2000))->comment("Почасовой оклад");
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
