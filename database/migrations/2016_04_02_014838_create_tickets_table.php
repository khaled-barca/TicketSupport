<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body');
            $table->enum("status",["Opened", "Closed", "In Progress"]);
            $table->integer('urgency')->nullable();
            $table->date("progress_date")->nullable();
            $table->date("end_date")->nullable();
            $table->integer('project_id')->unsigned();
            $table->integer('support_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('support_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function ($table) {
            $table->dropForeign('tickets_project_id_foreign');
            $table->dropForeign('tickets_customer_id_foreign');
            $table->dropForeign('tickets_support_id_foreign');
        });
        Schema::drop('tickets');
    }
}
