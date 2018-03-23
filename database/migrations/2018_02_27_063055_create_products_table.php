<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique()->nullable();
            $table->string('name',50);
            $table->string('description')->nullable();
            $table->string('model')->nullable();
            $table->integer('product_type_id')->unsigned()->index()->nullable();
            $table->integer('brand_id')->unsigned()->index()->nullable();
            $table->integer('sub_category_id')->unsigned()->index()->nullable();
            $table->integer('uom_id')->unsigned()->index()->nullable();
            $table->boolean('is_active')->default(true);
            $table->json('options')->nullable();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('uom_id')->references('id')->on('uoms');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');


            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
