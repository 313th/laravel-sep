<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sep_payments')){
            Schema::create('sep_payments', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
        }
        Schema::table('sep_payments', function (Blueprint $table) {
            if (!Schema::hasColumn('sep_payments', 'name')) {
                $table->string('name')->nullable();
            }else{
                $table->string('name')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'family')) {
                $table->string('family');
            }else{
                $table->string('family')->change();
            }
            if (!Schema::hasColumn('sep_payments', 'mobile')) {
                $table->string('mobile')->nullable();
            }else{
                $table->string('mobile')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'amount')) {
                $table->unsignedBigInteger('amount');
            }else{
                $table->unsignedBigInteger('amount')->change();
            }
            if (!Schema::hasColumn('sep_payments', 'description')) {
                $table->string('description')->nullable();
            }else{
                $table->string('description')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'status')) {
                $table->unsignedTinyInteger('status')->default(0);
            }else{
                $table->unsignedTinyInteger('status')->default(0)->change();
            }
            if (!Schema::hasColumn('sep_payments', 'refnum')) {
                $table->string('refnum')->nullable();
            }else{
                $table->string('refnum')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'card_pan')) {
                $table->string('card_pan')->nullable();
            }else{
                $table->string('card_pan')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'rrn')) {
                $table->string('rrn')->nullable();
            }else{
                $table->string('rrn')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'trace_number')) {
                $table->string('trace_number')->nullable();
            }else{
                $table->string('trace_number')->nullable()->change();
            }
            if (!Schema::hasColumn('sep_payments', 'wage')) {
                $table->unsignedBigInteger('wage')->default(0);
            }else{
                $table->unsignedBigInteger('wage')->default(0)->change();
            }
            if (!Schema::hasColumn('sep_payments', 'meta')) {
                $table->text('meta')->nullable();
            }else{
                $table->text('meta')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sep_payments');
    }
}
