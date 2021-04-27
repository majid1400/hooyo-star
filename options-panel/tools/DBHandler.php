<?php

class DBHandler {
	public $wp;
	public $prefix;
	public $ref_id;

	public function __construct() {
		global $wpdb;
		$this->wp     = $wpdb;
		$this->prefix = $this->wp->prefix;
		$this->ref_id = sanitize_text_field( $_GET['statistic_ref_id'] );
	}

	public function get_data_user() {
		$query = $this->wp->get_results( "SELECT * 
								   FROM {$this->prefix}wp_pro_quiz_statistic_ref
								   WHERE statistic_ref_id={$this->ref_id }" );

		foreach ( $query as $data ) {

			if ( ! isset( get_userdata( $data->user_id )->data->user_login ) ) {
				$user_nicename = 0;
				$user_type     = 'کاربر مهمان';
			} else {
				$user_nicename = get_userdata( $data->user_id )->data->user_login;
				$user_type     = 'عضو شده';
			}

			$arr = [
				'user_id'           => $data->user_id,
				'user_nicename'     => $user_nicename,
				'user_parent'       => ( isset( json_decode( $data->form_data, true )[1] ) ) ? json_decode( $data->form_data, true )[1] : '-',
				'phone_number'      => ( isset( json_decode( $data->form_data, true )[6] ) ) ? json_decode( $data->form_data, true )[6] : '-',
				'code_melli'        => ( isset( json_decode( $data->form_data, true )[7] ) ) ? json_decode( $data->form_data, true )[7] : '-',
				'number_child'      => ( isset( json_decode( $data->form_data, true )[8] ) ) ? json_decode( $data->form_data, true )[8] : '-',
				'child_name'        => ( isset( json_decode( $data->form_data, true )[10] ) ) ? json_decode( $data->form_data, true )[10] : '-',
				'child_family'      => ( isset( json_decode( $data->form_data, true )[11] ) ) ? json_decode( $data->form_data, true )[11] : '-',
				'how_many_children' => ( isset( json_decode( $data->form_data, true )[67] ) ) ? json_decode( $data->form_data, true )[67] : '-',
				'sex'               => ( isset( json_decode( $data->form_data, true )[17] ) ) ? json_decode( $data->form_data, true )[17] : '-',
				'day'               => ( isset( json_decode( $data->form_data, true )[43] ) ) ? json_decode( $data->form_data, true )[43] : '-',
				'month'             => ( isset( json_decode( $data->form_data, true )[29] ) ) ? json_decode( $data->form_data, true )[29] : '-',
				'year'              => ( isset( json_decode( $data->form_data, true )[30] ) ) ? json_decode( $data->form_data, true )[30] : '-',
				'user_type'         => $user_type,
				'quiz_id'           => $data->quiz_id,
				'create_time'       => $data->create_time,
			];


		}

		return $arr;
	}

	public function get_data_question() {
		$questions = $this->wp->get_results( "SELECT *
                                  FROM {$this->prefix}wp_pro_quiz_statistic
                                  WHERE statistic_ref_id={$this->ref_id}" );


		$arr = [
			'kalami'     => '0',
			'logical'    => '0',
			'pic'        => '0',
			'motion'     => '0',
			'music'      => '0',
			'miyanFardi' => '0',
			'daronFardi' => '0',
			'naturalist' => '0',
		];
		foreach ( $questions as $question ) {
			$question_id = $question->question_id;
			if ( $question_id == 136 OR $question_id == 137 OR $question_id == 138 OR $question_id == 139
			     OR $question_id == 182 OR $question_id == 141 OR $question_id == 142 OR $question_id == 143 ) {
				$arr['kalami'] += $question->points;
			}
			if ( $question_id == 104 OR $question_id == 105 OR $question_id == 106 OR $question_id == 107
			     OR $question_id == 144 OR $question_id == 145 OR $question_id == 146 OR $question_id == 147 ) {

				$arr['logical'] += $question->points;
			}
			if ( $question_id == 108 OR $question_id == 109 OR $question_id == 110 OR $question_id == 111
			     OR $question_id == 151 OR $question_id == 150 OR $question_id == 149 OR $question_id == 148 ) {
				$arr['pic'] += $question->points;
			}
			if ( $question_id == 112 OR $question_id == 113 OR $question_id == 114 OR $question_id == 115
			     OR $question_id == 155 OR $question_id == 154 OR $question_id == 153 OR $question_id == 152 ) {
				$arr['motion'] += $question->points;
			}
			if ( $question_id == 116 OR $question_id == 117 OR $question_id == 118 OR $question_id == 119
			     OR $question_id == 159 OR $question_id == 158 OR $question_id == 157 OR $question_id == 156 ) {
				$arr['music'] += $question->points;
			}
			if ( $question_id == 120 OR $question_id == 121 OR $question_id == 122 OR $question_id == 123
			     OR $question_id == 160 OR $question_id == 161 OR $question_id == 162 OR $question_id == 163 ) {
				$arr['miyanFardi'] += $question->points;
			}
			if ( $question_id == 124 OR $question_id == 125 OR $question_id == 126 OR $question_id == 127
			     OR $question_id == 164 OR $question_id == 165 OR $question_id == 166 OR $question_id == 167 ) {
				$arr['daronFardi'] += $question->points;
			}
			if ( $question_id == 128 OR $question_id == 129 OR $question_id == 130 OR $question_id == 131
			     OR $question_id == 168 OR $question_id == 169 OR $question_id == 170 OR $question_id == 171 ) {
				$arr['naturalist'] += $question->points;
			}
			if ( $question_id == 175 ) {
				$q          = 'فرزند شما از انجام چه کار‌ها و فعالیت‌هایی لذت می‌برد؟';
				$arr['q33'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 176 ) {
				$q          = 'فرزند شما از انجام چه کار‌هایی اجتناب می‌کند؟';
				$arr['q34'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 177 ) {
				$q          = 'فرزندتان را چگونه فردی توصیف می‌کنید؟';
				$arr['q35'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 178 ) {
				$q          = 'چه چیز‌هایی به فرزندتان انگیزه می‌دهد؟';
				$arr['q36'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 179 ) {
				$q          = 'فرزندتان دوست دارد وقتی بزرگ شد چه کاره شود؟';
				$arr['q37'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 180 ) {
				$q          = 'چه چیز‌هایی در فرزندتان انگیزه‌ای ایجاد نمی‌کند؟';
				$arr['q38'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 181 ) {
				$q          = 'فرزندتان چه بازی‌هایی داشته است؟';
				$arr['q39'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}

		}

		return $arr;

	}

	public function get_age_hosh() {
		$result = $this->wp->get_results(
			"SELECT * FROM {$this->prefix}data_form_hooyo_star WHERE statistic_ref_id = {$this->ref_id}"
		);

		if ( empty( $result ) ) {
			$housh = [];
			$age   = [];
			$status_date = $this->get_date_d();

			return [ $housh, $age, $status_date ];
		}


		$housh       = unserialize( $result[0]->data_form_hooyo_star )[0];
		$age         = unserialize( $result[0]->data_form_hooyo_star )[1];
		$status_date = unserialize( $result[0]->status_date );

		return [ $housh, $age, $status_date ];
	}

	public function get_date_d() {
		$create_time = $this->get_data_user()['create_time'];
		$day         = jdate( 'd', $create_time );

		$date = [
			'date_1' => [ 'show_user' => 'no', 'show_date' => '' ],
			'date_2' => [ 'show_user' => 'no', 'show_date' => '' ],
			'date_3' => [ 'show_user' => 'no', 'show_date' => '' ],
			'date_4' => [ 'show_user' => 'no', 'show_date' => '' ],
			'date_5' => [ 'show_user' => 'no', 'show_date' => '' ],
			'date_6' => [ 'show_user' => 'no', 'show_date' => '' ],
		];

		$date['date_1']['show_date'] = jdate( 'Y/m/d', $create_time );

		for ( $i = 1; $i <= 6; $i ++ ) {
			$sixmonths_fromnow                 = strtotime( "+" . $i . " months", $create_time );
			$date[ 'date_' . $i ]['show_date'] = jdate( "Y/m/" . $day, $sixmonths_fromnow );
		}

		return $date;
	}

	public function get_month() {
		$result_q = $this->wp->get_results(
			"SELECT * FROM {$this->prefix}hooyo_star_grid_result WHERE statistic_ref_id = {$this->ref_id}"
		);

//		var_dump( '<pre>' );
//		var_export( $result_q );
//		var_dump( '</pre>' );

		$result = [
			'month_1' => [ 'books' => [], 'games' => [], 'blogs' => [] ],
			'month_2' => [ 'books' => [], 'games' => [], 'blogs' => [] ],
			'month_3' => [ 'books' => [], 'games' => [], 'blogs' => [] ],
			'month_4' => [ 'books' => [], 'games' => [], 'blogs' => [] ],
			'month_5' => [ 'books' => [], 'games' => [], 'blogs' => [] ],
			'month_6' => [ 'books' => [], 'games' => [], 'blogs' => [] ],

		];

		for ( $i = 1; $i <= 6; $i ++ ) {
			foreach ( $result_q as $item ) {
				if ( $item->month == $i ) {
					if ( $item->grid_name == 'بلاگ' ) {
						$post = get_post( $item->product_id );

						$title     = $post->post_title;
						$permalink = $post->guid;
						$cat       = $item->grid_name;

						$result[ 'month_' . $item->month ]['blogs'][] = [
							'id'        => $item->product_id,
							'title'     => $title,
							'permalink' => $permalink,
							'cat'       => $cat
						];

					} else {
						$product = wc_get_product( $item->product_id );

						$stock     = ( $product->get_stock_quantity() == 0 ) ? false : true;
						$title     = strip_tags( $product->get_name() );
						$permalink = $product->get_permalink();
						$cat       = $item->grid_name;
						$cat_p     = ( $item->grid_name == 'بازی' ) ? 'games' : 'books';

						$result[ 'month_' . $item->month ][ $cat_p ][] = [
							'id'        => $item->product_id,
							'title'     => $title,
							'permalink' => $permalink,
							'cat'       => $cat,
							'stock'     => $stock
						];
					}
				}
			}
		}

		if ( empty( $result ) ) {
			$result = [];

			return $result;
		}


		return $result;
	}

	public function is_test_exist() {
		$exit_user_id = $this->wp->get_var( "SELECT COUNT(*) 
                                              FROM {$this->prefix}data_form_hooyo_star
                                              WHERE statistic_ref_id={$this->ref_id}" );

		if ( $exit_user_id <= 0 ) {
			return false;
		}

		return true;

	}

}

$query = new DBHandler();