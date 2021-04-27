<?php
$result = DBDashboard::pagination( 1000 );
$data   = DBDashboard::get_data_question_for_dashboard();
?>
<div class="wrap">
    <h1>لیست کاربران هویو استار</h1>
    <div class="container">

        <input type="text" id="searchstar" placeholder="جستجو کاربر...">
        <label for="searchstar" class="text-search-star">جستجو</label>
        <table class="wp-list-table widefat striped ">
            <thead>
            <tr>
                <th scope="col">نام کاربری</th>
                <th scope="col">نام فرزند</th>
                <th scope="col">سن فرزند</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">نوع کاربر</th>
                <th scope="col">اشتراک</th>
                <th scope="col">شروع اشتراک</th>
                <th scope="col">پایان اشتراک</th>
                <th scope="col">تلفن والد</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ( $data as $d ): ?>
            <?php $vip = VIPHandler::get_vip_customer($d['user_id']); ?>
                <tr>
                    <th scope="row">
                        <a href="<?php echo add_query_arg( [ 'statistic_ref_id' => $d['statistic_ref_id'] ] ) ?>">
							<?php echo $d["user_nicename"] . ' (' . $d["user_name"] . ')' ?>
                        </a>
                    </th>

                    <th scope="row">
						<?php echo $d["child_name"] . ' ' . $d["child_family"]; ?>
                    </th>

                    <th scope="row">
						<?php echo $d["day"] . ' - ' . $d["month"] . ' - ' . $d["year"]; ?>
                    </th>

                    <th scope="row">
						<?php echo jdate( 'Y/m/d', $d["create_time"] ); ?>
                    </th>

                    <th scope="row">
						<?php echo $d["user_type"]; ?>
                    </th>

                    <th scope="row">
						<?php echo $vip['membership_level']; ?>
                    </th>

                    <th scope="row">
						<?php echo $vip['created_date']; ?>
                    </th>

                    <th scope="row">
						<?php echo $vip['expiration_date']; ?>
                    </th>

                    <th scope="row">
						<?php echo $d["phone_number"]; ?>
                    </th>
                </tr>
			<?php endforeach; ?>

            </tbody>
        </table>
        <div class="tar table-responsive">
			<?php

			echo paginate_links( array(
				'base'      => add_query_arg( 'cpage', '%#%' ),
				'format'    => '',
				'prev_text' => __( '&laquo;' ),
				'next_text' => __( '&raquo;' ),
				'total'     => ceil( $result[0] / $result[1] ),
				'current'   => $result[2]
			) );
			?>
        </div>
    </div>
</div>