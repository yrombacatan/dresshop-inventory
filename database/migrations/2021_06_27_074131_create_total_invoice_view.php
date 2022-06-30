<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalInvoiceView extends Migration
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
            CREATE VIEW vw_total_invoice AS
                SELECT
                    DISTINCT(product.id)
                    , product.name
                    , SUM(IFNULL(invoice_details.entered_qty,0)) AS total_invoice
                FROM
                    product
                    LEFT JOIN invoice_details
                        ON (invoice_details.product_id = product.id)
                    LEFT JOIN invoice
                        ON (invoice.id = invoice_details.invoice_id)
                -- WHERE outgoing_order.order_stat <> 3
                GROUP BY product.id
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

            DROP VIEW IF EXISTS vw_total_invoice;
            SQL;
    }
}
