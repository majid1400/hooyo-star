<div class="wrap">
    <h2>تنظیمات افزونه هویو استار</h2>
    <form action="#" method="post">

        <div class="form-row">
            <label for="consumer_key">کلید مصرف کننده:</label>
            <input type="text" name="consumer_key" id="consumer_key" value="<?php echo esc_attr($options['consumer_key']) ?>">
        </div>

        <div class="form-row">
            <label for="consumer_password">رمز مصرف کننده:</label>
            <input type="text" name="consumer_password" id="consumer_password" value="<?php echo esc_attr($options['consumer_password']) ?>">
        </div>

        <div class="form-row">
            <button type="submit" name="save_settings" class="button button-primary">ذخیره تغییرات</button>
        </div>



    </form>
</div>