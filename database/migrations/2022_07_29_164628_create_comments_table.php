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
        Schema::create( 'comments', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'comment', 500 );
            $table->unsignedBigInteger( 'project_id' );
            $table->boolean( 'is_active' )->default( true );
            $table->unsignedBigInteger( 'created_by' )->comment( "Created by user id" );
            $table->unsignedBigInteger( 'updated_by' )->nullable( true )->comment( "Updated by user id" );
            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'comments' );
    }
};