<?php

/**
 * Plugin Name: WP-CLI Report
 * Description: Imprime um último registro da captura de click.
 * Version: 1.0
 * Author: Leonardo Graciano
 * License: GPL2
 */

function wp_cli_report_init()
{
    if (defined('WP_CLI') && WP_CLI) {
        /**
         * Imprime um relatório de histórico de registros.
         *
         * ## OPTIONS
         *
         * [--number=<number>]
         * : O número de entradas a serem impressas.
         * ---
         * default: 5
         * ---
         *
         * @when after_wp_load
         */
        class Custom_WPCLI_Command
        {

            public function __construct()
            {

                if (class_exists('WP_CLI')) {
                    WP_CLI::add_command('report_capture', array($this, 'capture_reports'));
                }
            }

            public function capture_reports($args, $assoc_args)
            {
                global $wpdb;

                $number = isset($assoc_args['number']) ? intval($assoc_args['number']) : 5;
                $table_name = $wpdb->prefix . 'capture_click';
                $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY time DESC LIMIT $number ");

                WP_CLI::line("Últimos $number Registros:");
                foreach ($results as $result) {
                    WP_CLI::line(sprintf("- Page: %s, Time: %s", $result->page, $result->time));
                }
            }
        }

        new Custom_WPCLI_Command();
    }
}

add_action('init', 'wp_cli_report_init');
