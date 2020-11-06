<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('doc_number',30)->nullable();
            $table->string('doc_name',100)->unique();
            $table->string('doc_area',50)->nullable();
            $table->integer('doc_version')->default(0);
            $table->integer('doc_responsible_id')->default(0);
            $table->integer('doc_worker_id')->default(0);
            $table->integer('doc_signer_id')->default(0);
            $table->json('doc_tags')->nullable();
            $table->date('doc_date_signing');
            $table->date('doc_date_expired')->nullable();
            $table->binary('doc_data');
            $table->softDeletes();
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
        Schema::dropIfExists('documents');
    }
}
