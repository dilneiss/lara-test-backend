<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currency_quotes', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'currency_id_fk')->references(['id'])->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currency_quotes', function (Blueprint $table) {
            $table->dropForeign('currency_id_fk');
        });
    }
};
