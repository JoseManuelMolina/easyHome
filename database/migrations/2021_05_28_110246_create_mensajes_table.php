<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Mensaje;
use App\Models\User;
use App\Models\Inmueble;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Mensaje::TABLA, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idinmueble');
            $table->string('nombre', 100);
            $table->string('email',150);
            $table->string('telefono',20)->nullable();
            $table->text('mensaje');
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on(User::TABLA);
            $table->foreign('idinmueble')->references('id')->on(Inmueble::TABLA);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Mensaje::TABLA);
    }
}
