<?php

class ResultMonth {

	private $wp;
	private $prefix;
	private $user_id;
	private $ref_id;

	public function __construct( $user_info, $ref_id ) {
		global $wpdb;
		$this->wp      = $wpdb;
		$this->prefix  = $this->wp->prefix;
		$this->ref_id  = $ref_id;
		$this->user_id = $user_info['user_id'];
	}

	public function save_data() {

		for ( $i = 1; $i <= 6; $i ++ ) {
			if ( isset( $_POST[ 'm_' . $i ] ) and ! empty( $_POST[ 'm_' . $i ] ) ) {
				foreach ( $_POST[ 'm_' . $i ] as $month ) {
					$arr_month = explode( ',', $month );
					$data      = [
						'user_id'          => $this->user_id,
						'statistic_ref_id' => $this->ref_id,
						'product_id'       => $arr_month[0],
						'grid_name'        => $arr_month[1],
						'month'            => $i,
					];

					if ( $this->is_user_exist( $arr_month[0] ) == false ) {
						$this->insert_data( $data );
					}

				}
			}
		}

	}

	public function insert_data( $data ) {
		$this->wp->insert( $this->prefix . 'hooyo_star_grid_result', $data );
	}

	public function delete_data() {

		for ( $i = 1; $i <= 6; $i ++ ) {
			if ( isset( $_POST[ 'd_' . $i ] ) and ! empty( $_POST[ 'd_' . $i ] ) ) {

				foreach ( $_POST[ 'd_' . $i ] as $id ) {
					$where = [ 'product_id' => $id, 'statistic_ref_id' => $this->ref_id ];
					$this->wp->delete( $this->wp->prefix . 'hooyo_star_grid_result', $where );

				}
			}
		}
	}

	public function is_user_exist( $product_id ) {

		$exit_user_id = $this->wp->get_var(
			"SELECT COUNT(*)
				   FROM {$this->prefix}hooyo_star_grid_result
                   WHERE 
                   product_id={$product_id} AND 
                   statistic_ref_id = {$this->ref_id}" );

		if ( $exit_user_id <= 0 ) {
			return false;
		}

		return true;

	}

}

$reutl_month = new ResultMonth( $user_info, $ref_id );