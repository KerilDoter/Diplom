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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('surname');
            $table->string('patronymic');
            $table->string('department')->nullable(); // кафедра
            $table->string('position')->nullable(); // должность
            $table->string('phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('vk')->nullable();
            $table->integer('rule_id')->nullable(); // роль (студент, преподаватель, модератор)
            $table->tinyInteger('is_admin')->default(0); // администратор или нет
            $table->string('about')->nullable(); // информация о себе
            $table->integer('skills_id')->nullable(); // скиллы (программист, дизайнер)
            $table->string('group')->nullable(); //группа ИТ

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('patronymic');
            $table->dropColumn('department');
            $table->dropColumn('position');
            $table->dropColumn('phone');
            $table->dropColumn('work_phone');
            $table->dropColumn('telegram');
            $table->dropColumn('vk');
            $table->dropColumn('rule_id');
            $table->dropColumn('is_admin');
            $table->dropColumn('about');
            $table->dropColumn('skills_id');
            $table->dropColumn('group');
        });
    }
};
