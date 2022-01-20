<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UniqueChangeTableTagPro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_product', function (Blueprint $table) {
            //
            $table->unique(['tag_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_product', function (Blueprint $table) {
            //
            $table->dropUnique(['tag_id','product_id']);
        });
    }
}
