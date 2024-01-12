<?php

/**
 * Capture Click
 * 
 * Plugin Name: Capture Click
 * Description: Plugin registrar click realizando
 * Version: 0.0.1
 * Author: Leonardo Graciano
 * License: GPL2 version
 */

if (!defined('ABSPATH')) {
    die("Request invalida");
}
class CaptureClick
{
    private $clickCount = 0;

    public function __construct()
    {
        add_action('init', array($this, 'registerShortCode'));
        add_action('rest_api_init', array($this, 'registerRestRoute'));
    }

    public function registerShortCode()
    {
        add_shortcode('capture-click', array($this, 'displayButton'));
    }

    public function displayButton($atts)
    {
        $atts = shortcode_atts(
            array(
                'text' => 'Registar click',
            ),
            $atts,
            'capture-click'
        );

        ob_start();
?>
        <button id="capture-click"><?php echo esc_html($atts['text']); ?></button>
        <script>
            document.getElementById('capture-click').addEventListener('click', function() {
                console.log('Script JavaScript está sendo executado!');
                fetch('/?rest_route=/capture-click/v1/click', {
                        method: 'POST'
                    }).then(response => console.log(response))
                    .catch(error => {
                        console.error('Erro no fetch:', error);
                    });;
            });
        </script>
<?php
        return ob_get_clean();
    }

    public function registerRestRoute()
    {
        register_rest_route('capture-click/v1', '/click', array(
            'methods' => 'POST',
            'callback' => array($this, 'handleClick'),
        ));
    }

    public function handleClick()
    {

        global $wpdb;

        $pageName = basename($_SERVER['PHP_SELF']);
        $time = current_time('mysql');

        $table_name = $wpdb->prefix . 'capture_click';

        $wpdb->insert(
            $table_name,
            array(
                'page' => $pageName,
                'time' => $time
            ),
            array('%s', '%s')
        );


        // Adicione esta linha para retornar uma resposta de depuração
        wp_send_json(array('message' => 'success'));
    }


    public function active()
    {
        flush_rewrite_rules();
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $table_name = $wpdb->prefix . 'capture_click';

        $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        page varchar(255) NOT NULL,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    public function deactivate()
    {
        flush_rewrite_rules();
    }
    public function uninstall()
    {
        flush_rewrite_rules();
    }
}



new CaptureClick();
