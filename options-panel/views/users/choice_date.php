<div class="fb fb__1">

    <div class="game fb fb__1_2">
        <h3>نمایش نتیجه تست</h3>
		<?php for ( $i = 1; $i <= 6; $i ++ ): ?>
            <label for="y_<?php echo $i ?>"><b>نمایش نتیجه تست ماه <?php echo $i ?>:</b>
                بله</label>

            <input type="radio" id="y_<?php echo $i ?>"
                   name="shuser_<?php echo $i ?>"
                   value="yes"
                <?php echo ($date_user["date_".$i]["show_user"]=='yes')?'checked':''; ?>
            >


            <label for="n_<?php echo $i ?>">خیر</label>
            <input type="radio" id="n_<?php echo $i ?>"
                   name="shuser_<?php echo $i ?>"
                   value="no"
	            <?php echo ($date_user["date_".$i]["show_user"]=='no')?'checked':''; ?>
            >
            <br>
            <br>
		<?php endfor; ?>

    </div>

    <div class="book fb fb__1_3">
        <h3>نمایش تاریخ تست</h3>
		<?php for ( $i = 1; $i <= 6; $i ++ ): ?>
            <label for="input_<?php echo $i ?>">ماه <?php echo $i ?></label>
            <input type="text" id="input_<?php echo $i ?>" name="date_<?php echo $i ?>" />
            <br>
            <br>
		<?php endfor; ?>



        <script type="text/javascript">
            jQuery(function () {
                jQuery("#input_1").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_1"]["show_date"] ?>",
                });
                jQuery("#input_2").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_2"]["show_date"] ?>",
                });
                jQuery("#input_3").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_3"]["show_date"] ?>",
                });
                jQuery("#input_4").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_4"]["show_date"] ?>",
                });
                jQuery("#input_5").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_5"]["show_date"] ?>",
                });
                jQuery("#input_6").persianDatepicker({
                    showGregorianDate: false,
                    selectedBefore: !0,
                    selectedDate: "<?php echo $date_user["date_6"]["show_date"] ?>",
                });
            });
        </script>

    </div>


</div>
<p class="submit">
    <button type="submit" name="save_date" class="button button-primary" value="save_date">ذخیره
        تاریخ
    </button>
</p>