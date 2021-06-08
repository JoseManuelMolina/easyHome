<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Inmueble;
use App\Models\User;
use App\Models\Provincia;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Inmueble::TABLA, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->enum('tipo',['vivienda', 'habitacion', 'local', 'oficina']);
            $table->unsignedBigInteger('idprovincia');
            $table->string('direccion', 50);
            $table->tinyInteger('nhabitaciones');
            $table->smallInteger('tamano');
            $table->string('extras', 50)->nullable();
            $table->decimal('precio',10,2);
            $table->binary('foto')->nullable();
            $table->text('comentario')->nullable();
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on(User::TABLA);
            $table->foreign('idprovincia')->references('id')->on(Provincia::TABLA);
        });
        
        $sql = 'alter table ' . Inmueble::TABLA . ' change foto foto mediumblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Inmueble::TABLA);
    }
}
