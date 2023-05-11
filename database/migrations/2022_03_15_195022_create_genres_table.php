<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nome');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        DB::table('genres')->insert([
            [
                'name' => 'Roguelike',
                'nome' => 'Roguelike'
            ],
            [
                'name' => 'Hentai',
                'nome' => 'Hentai'
            ],
            [
                'name' => 'Action',
                'nome' => 'Ação'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
};
