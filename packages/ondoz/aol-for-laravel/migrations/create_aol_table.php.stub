<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aol_access_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scope');
            $table->timestamps();
        });

        Schema::create('aol_access_permission_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('aol_access_permission_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aol_access_permission_id')->references('id')->on('aol_access_permissions')->onDelete('cascade');
        });

        Schema::create('user_aol_access_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('aol_access_permission_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('aol_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('host')->nullable();
            $table->string('access_token');
            $table->string('refresh_token');
            $table->longtext('scope');
            $table->string('name');
            $table->string('email');
            $table->integer('db_id')->nullable();
            $table->string('db_session')->nullable();
            $table->text('db_alias')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (empty($tableNames)) {
            throw new \Exception('Error: config/aol.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['aol_access_permissions']);
        Schema::drop($tableNames['aol_access_permission_user']);
        Schema::drop($tableNames['user_aol_access_permission']);
        Schema::drop($tableNames['aol_sessions']);
    }
}
