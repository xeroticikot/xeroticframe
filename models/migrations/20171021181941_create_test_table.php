<?php

use \xerotic\Migration;

class CreateTestTable extends Migration
{
    public function up(){
        $this->schema->create('test_table', function(\Illuminate\Database\Schema\Blueprint $table){
            $table->increments('id');
            $table->string('username', 100);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down(){
        $this->schema->drop('test_table');
    }
}
