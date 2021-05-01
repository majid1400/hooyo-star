<?php
/**
 * Created by PhpStorm.
 * User: Majid
 * Date: 27/04/2021
 * Time: 10:42 PM
 */


require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$store_url = 'http://example.com';
$endpoint = '/wc-auth/v1/authorize';
$params = [
	'app_name' => 'My App Name',
	'scope' => 'write',
	'user_id' => 123,
	'return_url' => 'http://app.com',
	'callback_url' => 'https://app.com'
];
$query_string = http_build_query( $params );

echo $store_url . $endpoint . '?' . $query_string;
class APIWOO {

	private $url;
	private $consumer_key;
	private $secret_key;
	private $version;

	public function __construct( $url, $consumer_key, $secret_key ) {
		$this->url          = $url;
		$this->consumer_key = $consumer_key;
		$this->secret_key   = $secret_key;
		$this->version      = 'v3';
		$this->init();
		$this->get_woo();

	}

	public function init() {
		$woocommerce = new Client(
			$this->url,
			$this->consumer_key,
			$this->secret_key,
			[
				'version' => $this->version // WooCommerce API version
			]
		);

		return $woocommerce;
	}

	public function get_woo() {
		var_dump('<pre>');
		var_export($this->init()->get(''));
		var_dump('</pre>');
	}


}

$hsp_settings = get_option( 'hsp_settings', [] );
$options      = $hsp_settings['api'];

new APIWOO( 'https://hooyo.ir/', $options['consumer_key'], $options['consumer_password'] );