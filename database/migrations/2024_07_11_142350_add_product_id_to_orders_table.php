<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
//    public function up()
//    {
//        // Check if the 'product_id' column does not exist before adding it
//        if (!Schema::hasColumn('orders', 'product_id')) {
//            Schema::table('orders', function (Blueprint $table) {
//                $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
//            });
//        }
//    }
//
//    public function down()
//    {
//        Schema::table('orders', function (Blueprint $table) {
//            if (Schema::hasColumn('orders', 'product_id')) {
//                $table->dropForeign(['product_id']);
//                $table->dropColumn('product_id');
//            }
//        });
//    }


    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }

};
