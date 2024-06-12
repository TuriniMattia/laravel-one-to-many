<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //1.Aggiunta colonna
            //2.Definito vincolo di relazione tra le colonne delle tabelle
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            $table->foreign('type_id')->references('id')->on('types')
                ->onDelete('set null');

            //Metodo abbreviato
            // $table->foreignId('type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //2.Rimuovere il vincolo
            $table->dropForeign('projects_type_id_foreign');
            //1.Rimuovere la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
