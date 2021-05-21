<?php


class DateHSD {
	public $ref_id;
	private $wp;
	private $prefix;

	public function __construct( $ref_id ) {
		global $wpdb;
		$this->wp     = $wpdb;
		$this->prefix = $this->wp->prefix;
		$this->ref_id = $ref_id;
	}

	public function save_date() {

		if ( isset( $_POST['save_date'] ) or isset($_POST['save_selected_hosh_age'])) {
			$is_save = false;
			$date    = [
				'date_1' => [ 'show_user' => '', 'show_date' => '' ],
				'date_2' => [ 'show_user' => '', 'show_date' => '' ],
				'date_3' => [ 'show_user' => '', 'show_date' => '' ],
				'date_4' => [ 'show_user' => '', 'show_date' => '' ],
				'date_5' => [ 'show_user' => '', 'show_date' => '' ],
				'date_6' => [ 'show_user' => '', 'show_date' => '' ],
			];
			for ( $i = 1; $i <= 6; $i ++ ) {
				if ( isset( $_POST[ 'date_' . $i ] ) and ! empty( $_POST[ 'date_' . $i ] ) and
				                                         isset( $_POST[ 'shuser_' . $i ] ) and ! empty( $_POST[ 'shuser_' . $i ] )
				) {
					$date[ "date_" . $i ]['show_user'] = $_POST[ 'shuser_' . $i ];
					$date[ "date_" . $i ]['show_date'] = $_POST[ 'date_' . $i ];
					if ( $i == 6 ) {
						$is_save = true;
					}
				}
			}

			if ( $is_save ) {
				$data = [
					'status_date' => serialize( $date ),
				];
				$this->update_data( $data );

			}

		}


	}

	public function update_data( $data ) {
		$where = [ 'statistic_ref_id' => $this->ref_id ];
		$this->wp->update( $this->prefix . 'data_form_hooyo_star', $data, $where );

	}


}

$date_user = new DateHSD( $ref_id );