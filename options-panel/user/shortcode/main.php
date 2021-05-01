<?php
function handler_result_hooyo_star_pro() {

	if ( is_user_logged_in() ) {
		global $wpdb;
		$id = get_current_user_id();


		$exit_user_id = $wpdb->get_var( "SELECT COUNT(*)
                                              FROM {$wpdb->prefix}data_form_hooyo_star
                                              WHERE user_id={$id}" );
		if ( $exit_user_id <= 0 ) {
			echo 'شما هنوز تست خود را انجام نداده اید';
		} else {
			$data_users_test = $wpdb->get_results(
				"SELECT * FROM {$wpdb->prefix}data_form_hooyo_star WHERE user_id = {$id}"
			);
			$user_old = false;

			if ($data_users_test[0]->statistic_ref_id == 0){
                $user_old = true;
                $status_user = $data_users_test[0]->status_user;
            }else{
                $new_test = unserialize( $data_users_test[0]->status_date )["date_1"]["show_user"];
                $status_user = ($new_test!='yes')?0:1;
            }


//			$status_user = $data_users_test[0]->status_user;
			$status_month_2  = $data_users_test[0]->status_month_2;
			$status_month_3  = $data_users_test[0]->status_month_3;
			$status_month_4  = $data_users_test[0]->status_month_4;
			$status_month_5  = $data_users_test[0]->status_month_5;
			$status_month_6  = $data_users_test[0]->status_month_6;


			if ( $status_user == 1 ) {
			    if ($user_old){

                    include HSP_OPTION . 'user/resulte_old.php';
                }else{
                    include HSP_OPTION . 'user/resulte_test.php';
                }
			} else {
				echo 'تست شما در حال بررسی می باشد تا 48 ساعت آینده جواب تست آماده خواهد شد';
			}
		}
	} else {
		return 'برای دیدن نتیجه تست لطفا با نام کاربری خود لاگین نمایید.';
	}


}

add_shortcode( 'result_hooyo_star_pro', 'handler_result_hooyo_star_pro' );