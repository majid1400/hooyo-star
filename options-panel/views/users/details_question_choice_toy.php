<div style="display: inline-table; width: 15%;">
    <div class="content_choice_age">
        <h2>انتخاب گروه سنی</h2>
        <div class="style_input">
            <input type="checkbox" id="under_3" name="age[]"
                   value="age_group_1" <?php echo ( in_array( 'age_group_1', $user_age_hosh_date[1] ) ) ? 'checked' : ' '; ?> />
            <label for="under_3">زیر سه سال</label><br>
        </div>

        <div class="style_input">
            <input type="checkbox" id="age_3_5" name="age[]"
                   value="age_group_2" <?php echo ( in_array( 'age_group_2', $user_age_hosh_date[1] ) ) ? 'checked' : ''; ?> />
            <label for="age_3_5">3 تا 5 سال</label><br>
        </div>

        <div class="style_input">
            <input type="checkbox" id="age_5_7" name="age[]"
                   value="age_group_3" <?php echo ( in_array( 'age_group_3', $user_age_hosh_date[1] ) ) ? 'checked' : ''; ?> />
            <label for="age_5_7">5 تا 7 سال</label><br>
        </div>

        <div class="style_input">
            <input type="checkbox" id="age_7_10" name="age[]"
                   value="age_group_4" <?php echo ( in_array( 'age_group_4', $user_age_hosh_date[1] ) ) ? 'checked' : ''; ?>/>
            <label for="age_7_10">7 تا 10 سال</label><br>
        </div>

        <div class="style_input">
            <input type="checkbox" id="age_10_15" name="age[]"
                   value="age_group_5" <?php echo ( in_array( 'age_group_5', $user_age_hosh_date[1] ) ) ? 'checked' : ''; ?>/>
            <label for="age_10_15">10 تا 15 سال</label><br>
        </div>

        <div class="style_input">
            <input type="checkbox" id="up_15" name="age[]"
                   value="grown-up" <?php echo ( in_array( 'grown-up', $user_age_hosh_date[1] ) ) ? 'checked' : ''; ?> />
            <label for="up_15">بزرگسال</label><br>
        </div>
    </div>
</div>


<div style="display: inline-block; width: 83%;">

    <div class="content_chocie_toy">
        <h2>انتخاب اسباب بازی</h2>
        <table class="wp-list-table widefat striped">
            <thead>
            <tr>
                <th scope="col">ماه</th>
                <th scope="col">موسیقیایی (%<?php echo $user_question['music'] ?>)</th>
                <th scope="col">تصویری (%<?php echo $user_question['pic'] ?>)</th>
                <th scope="col">حرکتی (%<?php echo $user_question['motion'] ?>)</th>
                <th scope="col">میان فردی (%<?php echo $user_question['miyanFardi'] ?>)</th>
                <th scope="col">درون فردی (%<?php echo $user_question['daronFardi'] ?>)</th>
                <th scope="col">کلامی (%<?php echo $user_question['kalami'] ?>)</th>
                <th scope="col">منطقی (%<?php echo $user_question['logical'] ?>)</th>
                <th scope="col">طبیعت گرا (%<?php echo $user_question['naturalist'] ?>)</th>
            </tr>
            </thead>
            <tbody>
			<?php for ( $i = 0; $i <= 5; $i ++ ): ?>
                <tr>
                    <th><?php echo ' ماه ' . ( $i + 1 ) ?></th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'music_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'music_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'pic_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'pic_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'motion_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'motion_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'miyanFardi_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'miyanFardi_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'daronFardi_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'daronFardi_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'kalami_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'kalami_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'logical_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'logical_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                    <th>
                        <input name="checkTestGardner[]" value="<?php echo 'naturalist_' . $i ?>"
                               type="checkbox" <?php echo ( in_array( 'naturalist_' . $i, $user_age_hosh_date[0] ) ) ? 'checked' : ''; ?> >
                    </th>
                </tr>
			<?php endfor ?>

            </tbody>

        </table>
    </div>
</div>


<p class="submit">
    <button type="submit" name="save_selected_hosh_age" value="save_selected_hosh_age" class="button button-primary">
        ذخیره تغییرات
    </button>
</p>