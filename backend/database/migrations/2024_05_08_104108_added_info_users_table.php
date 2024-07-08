<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('patronymic');
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('telegram')->nullable();
            $table->string('vk')->nullable();
            $table->integer('rule_id')->nullable();
            $table->tinyInteger('is_admin')->default(0);
            $table->string('about')->nullable();
            $table->integer('skills_id')->nullable();
            $table->string('group')->nullable();
        });
    }
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
