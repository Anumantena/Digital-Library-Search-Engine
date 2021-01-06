<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedDissertationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_dissertations', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('dissertation_id');
            $table->primary(['user_id', 'dissertation_id']);
            $table->timestamps();
});

}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_dissertations');
    }
}
