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
        Schema::table('books', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(0)->after('price'); //tabloya ekleyeceğimiz alan boolean türünden olucak ve adı is_deleted. price alanından sonra eklensin dedik. Mantığı: 0 olanlar gösterilcek sitede
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('is_deleted');           
        });
    }
};
