<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cep', 15)->nullable()->after('email');
            $table->string('logradouro')->nullable()->after('cep');
            $table->string('numero')->nullable()->after('logradouro');
            $table->string('bairro')->nullable()->after('numero');
            $table->string('cidade')->nullable()->after('bairro');
            $table->string('estado')->nullable()->after('cidade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cep', 'logradouro', 'numero', 'bairro', 'cidade', 'estado']);
        });
    }
}
