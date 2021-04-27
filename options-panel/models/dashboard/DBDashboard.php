<?php

class DBDashboard {

	public static $results;

	public function __construct() {

	}

	public static function pagination( $pages ) {
		global $wpdb;
		$query          = "(SELECT * FROM {$wpdb->prefix}wp_pro_quiz_statistic_ref)";
		$total_query    = "SELECT COUNT(1) FROM (${query}) AS combined_table";
		$total          = $wpdb->get_var( $total_query );
		$items_per_page = $pages;
		$page           = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
		$offset         = ( $page * $items_per_page ) - $items_per_page;
		self::$results  = $wpdb->get_results( "${query} ORDER BY create_time DESC LIMIT ${offset}, ${items_per_page}" );

		return [ $total, $items_per_page, $page ];
	}

	public static function get_data_question_for_dashboard() {
		foreach ( self::$results as $data ) {

			if ( ! isset( get_userdata( $data->user_id )->data->user_nicename ) ) {
				$user_nicename = 0;
				$user_type     = 'کاربر مهمان';
			} else {
				$user_nicename = get_userdata( $data->user_id )->data->user_nicename;
				$user_type     = 'عضو شده';
			}

			$arr[] = [
				'user_id'          => $data->user_id,
				'user_nicename'    => $user_nicename,
				'user_name'        => ( isset( json_decode( $data->form_data, true )[1] ) ) ? json_decode( $data->form_data, true )[1] : '-',
				'phone_number'     => ( isset( json_decode( $data->form_data, true )[6] ) ) ? json_decode( $data->form_data, true )[6] : '-',
				'child_name'       => ( isset( json_decode( $data->form_data, true )[10] ) ) ? json_decode( $data->form_data, true )[10] : '-',
				'child_family'     => ( isset( json_decode( $data->form_data, true )[11] ) ) ? json_decode( $data->form_data, true )[11] : '-',
				'day'              => ( isset( json_decode( $data->form_data, true )[43] ) ) ? json_decode( $data->form_data, true )[43] : '-',
				'month'            => ( isset( json_decode( $data->form_data, true )[29] ) ) ? json_decode( $data->form_data, true )[29] : '-',
				'year'             => ( isset( json_decode( $data->form_data, true )[30] ) ) ? json_decode( $data->form_data, true )[30] : '-',
				'user_type'        => $user_type,
				'quiz_id'          => $data->quiz_id,
				'statistic_ref_id' => $data->statistic_ref_id,
				'create_time'      => $data->create_time,
			];


		}

		return $arr;

	}
}