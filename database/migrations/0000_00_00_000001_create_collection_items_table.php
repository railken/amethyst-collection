<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateCollectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(Config::get('amethyst.collection.data.collection-item.table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('collection_id')->unsigned();
            $table->foreign('collection_id')->references('id')->on(Config::get('amethyst.collection.data.collection.table'));
            $table->string('collectionable_type');
            $table->integer('collectionable_id')->unsigend();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('amethyst.collection.data.collection-item.table'));
    }
}
