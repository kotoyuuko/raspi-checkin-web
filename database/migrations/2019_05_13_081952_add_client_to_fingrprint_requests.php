<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientToFingrprintRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fingerprint_requests', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fingerprint_requests', function (Blueprint $table) {
            $table->dropColumn('client_id');

            $table->dropForeign('fingerprint_requests_client_id_foreign');
        });
    }
}
