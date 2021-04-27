<?php

class SelectedAgeHosh {
	public $user_id;
	public $child_name;
	public $ref_id;
	public $user_question;
	public $g;
	private $wp;
	private $prefix;
	private $is_test_exist;

	public function __construct( $user_info, $user_question, $ref_id, $is_test_exist ) {
		global $wpdb;
		$this->wp            = $wpdb;
		$this->prefix        = $this->wp->prefix;
		$this->user_id       = $user_info['user_id'];
		$this->child_name    = $user_info['child_name'];
		$this->ref_id        = $ref_id;
		$this->user_question = $user_question;
		$this->is_test_exist = $is_test_exist;
	}

	public function check_submit_form_month() {

		if ( isset( $_POST['save_selected_hosh_age'] ) ) {
			if ( ! isset( $_POST['age'] ) && empty( $_POST['age'] ) ) {
				wp_die( "<h2 class='error-message'>خطا: فیلد انتخاب سن رو پر نمایید</h2>" );
			}
			if ( ! isset( $_POST['checkTestGardner'] ) && empty( $_POST['checkTestGardner'] ) ) {
				wp_die( "<h2 class='error-message'>خطا: فیلد انتخاب اسباب بازی رو پر نمایید</h2>" );
			}

			$housh_percent = [
				[
					'percentage_test' =>
						[
							'kalami'     => $this->user_question['kalami'],
							'logical'    => $this->user_question['logical'],
							'pic'        => $this->user_question['pic'],
							'motion'     => $this->user_question['motion'],
							'music'      => $this->user_question['music'],
							'miyanFardi' => $this->user_question['miyanFardi'],
							'daronFardi' => $this->user_question['daronFardi'],
							'naturalist' => $this->user_question['naturalist']
						]
				],
			];
			$data          = [
				'data_form_hooyo_star' => serialize( [ $_POST['checkTestGardner'], $_POST['age'] ] ),
				'user_id'              => $this->user_id,
				'child_name'           => $this->child_name,
				'info_user'            => serialize( $housh_percent ),
				'statistic_ref_id'     => $this->ref_id,
			];

			if ( $this->is_test_exist == false ) {
				$this->insert_data( $data );
			} else {
				$this->update_data( $data );
			}
		}
	}

	public function insert_data( $data ) {
		$this->wp->insert( $this->prefix . 'data_form_hooyo_star', $data );
	}

	public function update_data( $data ) {
		$where = [ 'statistic_ref_id' => $this->ref_id ];
		$this->wp->update( $this->prefix . 'data_form_hooyo_star', $data, $where );
	}
}

$selectedAgeHosh = new SelectedAgeHosh( $user_info, $user_question, $ref_id, $is_test_exist );