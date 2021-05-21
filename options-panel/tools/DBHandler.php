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

			if ( $question_id == 306 OR $question_id == 309 OR $question_id == 312 OR $question_id == 315
			     OR $question_id == 318 OR $question_id == 321 OR $question_id == 186 OR $question_id == 189 OR $question_id == 288 OR $question_id == 291 ) {
				$arr['kalami'] += $question->points;
			}
			if ( $question_id == 327 OR $question_id == 330 OR $question_id == 453 OR $question_id == 336
			     OR $question_id == 339 OR $question_id == 342 OR $question_id == 294 OR $question_id == 297  OR $question_id == 300  OR $question_id == 303 ) {
				$arr['logical'] += $question->points;
			}
			if ( $question_id == 345 OR $question_id == 348 OR $question_id == 351 OR $question_id == 354
			     OR $question_id == 357 OR $question_id == 360 OR $question_id == 276 OR $question_id == 279 OR $question_id == 282 OR $question_id == 285 ) {
				$arr['pic'] += $question->points;
			}
			if ( $question_id == 363 OR $question_id == 366 OR $question_id == 369 OR $question_id == 372
			     OR $question_id == 375 OR $question_id == 378 OR $question_id == 264 OR $question_id == 267 OR $question_id == 270 OR $question_id == 273 ) {
				$arr['motion'] += $question->points;
			}
			if ( $question_id == 381 OR $question_id == 384 OR $question_id == 387 OR $question_id == 390
			     OR $question_id == 393 OR $question_id == 396 OR $question_id == 252 OR $question_id == 255 OR $question_id == 258 OR $question_id == 261 ) {
				$arr['music'] += $question->points;
			}
			if ( $question_id == 399 OR $question_id == 456 OR $question_id == 405 OR $question_id == 408
			     OR $question_id == 411 OR $question_id == 414 OR $question_id == 240 OR $question_id == 243 OR $question_id == 246 OR $question_id == 249 ) {
				$arr['miyanFardi'] += $question->points;
			}
			if ( $question_id == 417 OR $question_id == 420 OR $question_id == 459 OR $question_id == 426
			     OR $question_id == 429 OR $question_id == 432 OR $question_id == 228 OR $question_id == 231 OR $question_id == 234 OR $question_id == 237 ) {
				$arr['daronFardi'] += $question->points;
			}
			if ( $question_id == 435 OR $question_id == 438 OR $question_id == 441 OR $question_id == 444
			     OR $question_id == 447 OR $question_id == 450 OR $question_id == 225 OR $question_id == 222 OR $question_id == 219 OR $question_id == 216 ) {
				$arr['naturalist'] += $question->points;
			}
			if ( $question_id == 195 ) {
				$q          = 'فرزند شما از انجام چه کار‌ها و فعالیت‌هایی لذت می‌برد؟';
				$arr['q33'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 198 ) {
				$q          = 'فرزند شما از انجام چه کار‌هایی اجتناب می‌کند؟';
				$arr['q34'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 201 ) {
				$q          = 'فرزندتان را چگونه فردی توصیف می‌کنید؟';
				$arr['q35'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 204 ) {
				$q          = 'چه چیز‌هایی به فرزندتان انگیزه می‌دهد؟';
				$arr['q36'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 207 ) {
				$q          = 'فرزندتان دوست دارد وقتی بزرگ شد چه کاره شود؟';
				$arr['q37'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 210 ) {
				$q          = 'چه چیز‌هایی در فرزندتان انگیزه‌ای ایجاد نمی‌کند؟';
				$arr['q38'] = [ $q, json_decode( $question->answer_data, true )[0] ];
			}
			if ( $question_id == 213 ) {
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

		if (!unserialize( $result[0]->status_date )){
            $housh = [];
            $age   = [];
            $status_date = $this->get_date_d();
            return [ $housh, $age, $status_date ];
        }

		if (unserialize( $result[0]->status_date )["date_1"]["show_user"] == "no"){
            $housh       = unserialize( $result[0]->data_form_hooyo_star )[0];
            $age         = unserialize( $result[0]->data_form_hooyo_star )[1];
            $status_date = unserialize( $result[0]->status_date );


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