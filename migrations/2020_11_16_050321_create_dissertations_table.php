<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDissertationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dissertations', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('contributor_author')->nullable();
            $table->string('contributor_committeechair')->nullable();
            $table->text('contributor_committeemember')->nullable();
            $table->string('contributor_department')->nullable();
            $table->dateTime('date_accessioned')->nullable();
            $table->string('date_adate')->nullable();
            $table->dateTime('date_available')->nullable();
            $table->string('date_issued')->nullable();
            $table->string('date_rdate')->nullable();
            $table->string('date_sdate')->nullable();
            $table->string('degree_grantor')->nullable();
            $table->string('degree_level')->nullable();
            $table->string('degree_name')->nullable();
            $table->text('description_abstract')->nullable();
            $table->string('description_degree')->nullable();
            $table->text('description_provenance')->nullable();
            $table->string('format_medium')->nullable();
            $table->string('handle')->nullable();
            $table->string('identifier_other')->nullable();
            $table->string('identifier_sourceurl')->nullable();
            $table->string('identifier_uri')->nullable();
            $table->string('publisher')->nullable();
            $table->text('relation_haspart')->nullable();
            $table->text('rights')->nullable();
            $table->text('subject')->nullable();
            $table->text('title')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('dissertations');
    }
}
