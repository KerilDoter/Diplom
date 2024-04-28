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
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('cardName');
            $table->dropColumn('cardImage');
            $table->dropColumn('cardDescription');

            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->unsignedBigInteger('status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'content', 'category_id', 'attachment_id', 'status_id']);
            $table->string('cardName');
            $table->string('cardImage');
            $table->string('cardDescription');
        });
    }
};
