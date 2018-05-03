<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('inventory')!=TRUE) {
            Schema::create('inventory', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->text('unit');
                $table->integer('quantity');
                $table->text('expiry_date');
                $table->text('status');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
        }
        if (Schema::hasTable('inventory_reports')!=TRUE) {
            Schema::create('inventory_reports', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->integer('occurrences');
                $table->integer('dif_total');
                $table->integer('ranking');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
        }
        if (Schema::hasTable('inventory_shipping')!=TRUE) {
            Schema::create('inventory_shipping', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->text('unit/s');
                $table->integer('quantity');
                $table->text('expiry_date');
                $table->text('recipient');
                $table->text('origin');
                $table->text('type_of_transaction');
                $table->text('remarks');
                $table->text('date_distributed');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
          }
        if (Schema::hasTable('inventory_in_others')!=TRUE) {
                Schema::create('inventory_in_others', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('inventory_id',60);
                    $table->text('medicine');
                    $table->text('unit/s');
                    $table->integer('quantity');
                    $table->text('expiry_date');
                    $table->text('recipient');
                    $table->text('origin');
                    $table->text('type_of_transaction');
                    $table->text('remarks');

                    $table->softDeletes();
                    $table->timestamps();
                    $table->unique('inventory_id');
                });
        }
        if (Schema::hasTable('inventory_disposal')!=TRUE) {
            Schema::create('inventory_disposal', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->text('unit/s');
                $table->integer('quantity');
                $table->text('expiry_date');
                $table->text('origin');
                $table->text('type_of_transaction');
                $table->text('days_expired');
                $table->text('remarks');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
        }
        if (Schema::hasTable('inventory_referral')!=TRUE) {
            Schema::create('inventory_referral', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->text('unit/s');
                $table->integer('quantity');
                $table->text('expiry_date');
                $table->text('recipient');
                $table->text('origin');
                $table->text('type_of_transaction');
                $table->text('date_referred');
                $table->text('remarks');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
        }
        if (Schema::hasTable('inventory_out_others')!=TRUE) {
            Schema::create('inventory_out_others', function (Blueprint $table) {
                $table->increments('id');
                $table->string('inventory_id',60);
                $table->text('medicine');
                $table->text('unit/s');
                $table->integer('quantity');
                $table->text('expiry_date');
                $table->text('recipient');
                $table->text('origin');
                $table->text('type_of_transaction');
                $table->text('remarks');

                $table->softDeletes();
                $table->timestamps();
                $table->unique('inventory_id');
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory');
        Schema::drop('inventory_reports');
        Schema::drop('inventory_shipping');
        Schema::drop('inventory_in_others');
        Schema::drop('inventory_disposal');
        Schema::drop('inventory_referral');
        Schema::drop('inventory_out_others');
    }

}
