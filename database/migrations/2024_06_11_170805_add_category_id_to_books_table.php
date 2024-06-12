<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'category_id')) {
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}