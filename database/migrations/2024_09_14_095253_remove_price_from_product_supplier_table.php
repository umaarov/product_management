<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePriceFromProductSupplierTable extends Migration
{
    public function up()
    {
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

    public function down()
    {
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->default(0.00);
        });
    }
}
