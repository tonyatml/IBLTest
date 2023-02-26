<?php
/*
Plugin Name: Greeting API
Plugin URI: http://yourpluginuri.com/
Description: Exposes a simple API that stores a greeting message in the database.
Version: 1.0
Author: Tony Niu
Author URI: http://yourwebsite.com/
*/

require_once( plugin_dir_path( __FILE__ ) . 'oauth2.php' );

// Create database table for storing greeting message
function create_greeting_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'greetings';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        greeting text NOT NULL,
        created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Register activation hook for creating database table
register_activation_hook( __FILE__, 'create_greeting_table' );

// Define API endpoint for storing greeting message
add_action( 'rest_api_init', function () {
    register_rest_route( 'greeting-api/v1', '/store/', array(
        'methods' => 'POST',
        'callback' => 'store_greeting_message',
        'permission_callback' => function ( $request ) {
            $oauth = new OAuth2();
            return $oauth->verifyAccessToken($request);
        },
        'args' => array(
            'greeting' => array(
                'required' => true,
                'sanitize_callback' => 'sanitize_text_field'
            )
        )
    ) );
} );

// Store greeting message in database
function store_greeting_message( $request ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'greetings';
    $data = array(
        'greeting' => $request['greeting'],
        'created_at' => current_time( 'mysql' )
    );
    $wpdb->insert( $table_name, $data );
    return array( 'message' => 'Greeting message stored successfully.' );
}

// display the greetings in a table
function display_greetings() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'greetings';
    $greetings = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id DESC limit 20" );
    ?>
    <h1>Last 20 Greetings</h1>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Greeting</th>
                <th>Created Time</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $greetings as $greeting ) : ?>
            <tr>
                <td><?php echo $greeting->id; ?></td>
                <td><?php echo $greeting->greeting; ?></td>
                <td><?php echo $greeting->created_at; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}

// create a new admin menu item that will display the greetings when clicked
function add_greetings_menu() {
    add_menu_page(
        'Greetings',   // page title
        'Greetings',   // menu title
        'manage_options',   // capability
        'greetings',   // menu slug
        'display_greetings',   // callback function
        'dashicons-format-chat',   // icon
    );
}

add_action( 'admin_menu', 'add_greetings_menu' );
