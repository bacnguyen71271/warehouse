<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateWarehouseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('type');
            $table->integer('warehouseId');
            $table->string('tenchuongtrinh');
            $table->integer('userid');
            $table->integer('danhmucId');
            $table->integer('soluong');
            $table->date('hansudung')->nullable();
            $table->date('thoigian')->nullable();
            $table->boolean('status')->nullable();
            $table->string('ghichu')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_histories');
    }
}
