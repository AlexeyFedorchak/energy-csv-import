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
            $table->timestamp('lieferstart')->nullable();
            $table->timestamp('prov_von')->nullable();
            $table->timestamp('prov_bis')->nullable();
            $table->string('aufschlag')->nullable();
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
          $table->dropColumn('lieferstart');
          $table->dropColumn('prov_von');
          $table->dropColumn('prov_bis');
          $table->dropColumn('aufschlag');
      });
  }
};
