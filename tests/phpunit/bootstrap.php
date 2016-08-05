<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

if ( getenv( 'WP_CORE_DIR' ) ) {
	$_core_dir = getenv( 'WP_CORE_DIR' );
} else if ( getenv( 'WP_DEVELOP_DIR' ) ) {
	$_core_dir = getenv( 'WP_DEVELOP_DIR' ) . '/src/';
} else {
	$_core_dir = '/tmp/wordpress';
}

// Easiest way to get this to where WordPress will load it
copy( dirname( dirname( dirname( __FILE__ ) ) ) . '/object-cache.php', $_core_dir . '/wp-content/object-cache.php' );

require $_tests_dir . '/includes/bootstrap.php';

error_log( PHP_EOL );
$apcu_state = function_exists( 'apcu_sma_info' ) && apcu_sma_info() ? 'enabled' : 'disabled';
error_log( 'APCu: ' . $apcu_state . PHP_EOL );
error_log( PHP_EOL );
