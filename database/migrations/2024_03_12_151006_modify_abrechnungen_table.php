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
        Schema::table('abrechnungen', function (Blueprint $table) {
            $table->string('contract_id')->after('id');
            $table->timestamp('period')->after('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abrechnungen', function (Blueprint $table) {
            $table->dropColumn('contract_id');
            $table->dropColumn('period');
        });
    }
};
