<?php
$user_info     = $query->get_data_user();
$user_question = $query->get_data_question();
$is_test_exist = $query->is_test_exist();
$ref_id        = $query->ref_id;
$vip = VIPHandler::get_vip_customer($user_info['user_id']);
?>
<h2>اطلاعات کاربر</h2>

<div class="wrap" style="">
    <h1>جزئیات حساب کاربر</h1>

    <div style="margin-bottom: 20px">
        <table class="wp-list-table widefat striped">
            <tr>
                <th scope="col"><b>نام والد</b></th>
                <td><?php echo $user_info['user_parent'] . " ({$user_info['phone_number']})" ?></td>
            </tr>
            <tr>
                <th scope="col"><b>نام کاربری</b></th>
                <td><?php echo $user_info['user_nicename'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تعداد فرزندان</b></th>
                <td><?php echo $user_info['number_child'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>نام فرزند</b></th>
                <td><?php echo $user_info['child_name'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>جنسیت</b></th>
                <td><?php echo $user_info['sex'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>فرزند چندم خانواده</b></th>
                <td><?php echo $user_info['how_many_children'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تاریخ تولد</b></th>
                <td><?php echo "{$user_info['year']}-{$user_info['month']}-{$user_info['day']}" ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تاریخ شروع تست</b></th>
                <td><?php echo jdate( 'Y/m/d', $user_info['create_time'] ) ?></td>
            </tr>
            <tr>
                <th scope="col"><b>نوع کاربری</b></th>
                <td><?php echo $user_info['user_type'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تست برای</b></th>
                <td><?php echo $user_info['quiz_id'] == 1 ? 'بالای سه سال' : 'زیر سه سال' ?></td>
            </tr>

            <tr>
                <th scope="col"><b>وضعیت اشتراک</b></th>
                <td><?php echo $vip['status'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>نوع اشتراک</b></th>
                <td><?php echo $vip['membership_level'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تاریخ شروع اشتراک</b></th>
                <td><?php echo $vip['created_date'] ?></td>
            </tr>
            <tr>
                <th scope="col"><b>تاریخ اتمام اشتراک</b></th>
                <td><?php echo $vip['expiration_date'] ?></td>
            </tr>

        </table>
    </div>

    <div class="table-row-hsp">
        <table class="wp-list-table widefat striped">

			<?php for ( $i = 33; $i <= 39; $i ++ ): ?>
            <?php $q = (!isset($user_question["q{$i}"][0]))?'داده ای برای نمایش وجود ندارد': $user_question["q{$i}"][0] ?>
            <?php $answer = (!isset($user_question["q{$i}"][1]))?'داده ای برای نمایش وجود ندارد': $user_question["q{$i}"][1] ?>

                <tr>
                    <th scope="col"><b><?php echo "{$i}- " . $q ?></b></th>
                    <td><?php echo $answer ?></td>
                </tr>
			<?php endfor; ?>
        </table>
    </div>

</div>

<div class="wrap dashboard_result">
    <h1>بررسی نتیجه تست</h1>

    <form method="POST">
		<?php
            include HSP_OPTION . "models/users/SelectedAgeHosh.php";
            $selectedAgeHosh->check_submit_form_month();
            $user_age_hosh_date = $query->get_age_hosh();

            include "details_question_choice_toy.php";
		?>
    </form>
</div>

<div class="wrap dashboard_result">
    <h1>انتخاب ماه</h1>
    <form method="POST">
		<?php
            include HSP_OPTION . "models/users/ResultMonth.php";
            $reutl_month->save_data();
            $reutl_month->delete_data();
            $results = $query->get_month();

            include HSP_OPTION . "models/users/ArgQuery.php";
            $blogs_s = $Arg_query->wp_post();
            $product = $Arg_query->wp_query();

            include "details_question_month.php"
		?>
    </form>
</div>

<div class="wrap dashboard_result">
    <h1>انتخاب تاریخ</h1>
    <form method="POST">
		<?php
            include HSP_OPTION . "/models/users/DateHSD.php";
            $date_user->save_date();
            $date_user = $query->get_age_hosh()[2];

            include 'choice_date.php'
        ?>
    </form>
</div>
