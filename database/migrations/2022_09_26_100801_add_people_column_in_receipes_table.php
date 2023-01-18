<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeopleColumnInReceipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipes', function (Blueprint $table) {
            if (!Schema::hasColumn('receipes', 'people')) {
                $table->integer('people')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipes', function (Blueprint $table) {
            //
        });
    }
}
