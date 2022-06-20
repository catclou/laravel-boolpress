<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            // aggiungo colonna alla tabella posts
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            // realizzo la relazione
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')->onDelete('set null'); // con set null sulla onDelete specifico che, se elimino la categoria, non eliminerò tutti i post ad essa collegata sino ad ora (di default, invece, è cascade)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            $table->dropForeign('posts_category_id_foreign');

            $table->dropColumn('category_id');

        });
    }
}
