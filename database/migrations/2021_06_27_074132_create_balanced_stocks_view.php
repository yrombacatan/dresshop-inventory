<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancedStocksView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }

    /**
     * Creating of view in the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        /**
         * Before executing the migration script of laravel, be sure that you set the strict mode to false
         * in config/database.php under mysql array set.
         * If error still exists, please follow instructions below.
         * Please execute the Create View script starting from line 38 until line 60 in your phpMyAdmin
         */
        return <<<SQL
            CREATE VIEW vw_balanced_stocks AS
                SELECT
                    DISTINCT(product.id)
                    , product.name
                    , product.quantity
                    , product.sell_price
                    , IFNULL(vw_total_invoice.total_invoice, 0) AS total_invoice
                    , IFNULL(product.quantity, 0) - IFNULL(vw_total_invoice.total_invoice, 0) AS balanced_stocks
                FROM
                    product
                    LEFT JOIN vw_total_invoice
                        ON (vw_total_invoice.id = product.id)
            SQL;
    }

    /**
     * Droping of view in the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS vw_balanced_stocks;
            SQL;
    }
}
