<?php
$child_name = $data_users_test[0]->child_name;
$info_user  = unserialize( $data_users_test[0]->info_user )[0]['percentage_test'];


$product_ids = $wpdb->get_results(
	"SELECT * FROM {$wpdb->prefix}hooyo_star_grid_result WHERE user_id = {$id}"
);
$status_users = $wpdb->get_results(
	"SELECT * FROM {$wpdb->prefix}data_form_hooyo_star WHERE user_id = {$id}"
);

$datess = [
	'status_month_1' => '',
	'status_month_2' => '',
	'status_month_3' => '',
	'status_month_4' => '',
	'status_month_5' => '',
	'status_month_6' => '',
];
foreach ($status_users as $sa){

	if(unserialize($sa->status_date)){
		$datess['status_month_1'] = unserialize($sa->status_date)['date_1']['show_user'];
		$datess['status_month_2'] = unserialize($sa->status_date)['date_2']['show_user'];
		$datess['status_month_3'] = unserialize($sa->status_date)['date_3']['show_user'];
		$datess['status_month_4'] = unserialize($sa->status_date)['date_4']['show_user'];
		$datess['status_month_5'] = unserialize($sa->status_date)['date_5']['show_user'];
		$datess['status_month_6'] = unserialize($sa->status_date)['date_6']['show_user'];

	}
}

//var_dump('<pre>');
//print_r($datess);
//var_dump('</pre>');

?>

<!--HTML-->
<div class="main-natije">
    <div class="first-head-natije"><h1 class="iner-first-head-natije">نتیجه تست</h1></div>
    <div class="box-first-natije">
        <div class="iner-box-natije">
            <div class="top-inerix-natije">
                <div class="matn-natije">
                    <p class="p-hosh">نتیجه تست هوش برای</p>
                    <b class="p-name"><?php echo $child_name ?></b>
                </div>
                <!-- chart -->
				<?php echo do_shortcode( '[chart_hooyo_star_pro]' ); ?>
            </div>
        </div>
    </div>

    <!-- game-pishnahadi -->
    <div id="primary">
        <main class="site-main">
            <h1 class="accordion_m">بازی های پیشنهادی ماه اول</h1>
            <!--            <ul class="products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">-->
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">

				<?php foreach ( $product_ids as $product_id ): ?>
                <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 1 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">

                            <!-- image -->
                            <div class="product-element-top">
                                <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                   class="product-image-link">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                </a>
                            </div>

                            <!-- title -->
                            <h3 class="product-title margin_prodict">
                                <a
                                        href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                            </h3>

                            <!-- price -->
                            <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                            <!-- cart -->
                            <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                   class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                   data-product_id="<?php echo $product_id->product_id ?>">
                                    <span>افزودن به سبد خرید</span>
                                </a>
                            </div>

                        </div>
					<?php endif; ?>
                    <?php endif; ?>
				<?php endforeach; ?>
            </div>
            <!--            </ul>-->

            <h1 class="accordion_m">بازی های پیشنهادی ماه دوم</h1>
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
				<?php foreach ( $product_ids as $product_id ): ?>
	            <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 2 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<?php if ( $datess['status_month_2'] == 'no' ): ?>
                                <p class="msg_hidden">بازی های پیشنهادی این ماه در زمان مقرر نمایش داده می شود</p>
                                <!-- image -->
                                <div class="product-element-top">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail <?php echo( $datess['status_month_2'] == 'no' ? 'blurhooyo' : '' ); ?>">
                                </div>
                                <!-- title -->
                                <h3 class="product-title margin_prodict <?php echo( $datess['status_month_2'] == 'no' ? 'blurhooyo' : '' ); ?>">
									<?php echo get_the_title( $product_id->product_id ) ?>
                                </h3>

							<?php else: ?>
                                <!-- image -->
                                <div class="product-element-top">
                                    <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                       class="product-image-link">
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                    </a>
                                </div>

                                <!-- title -->
                                <h3 class="product-title margin_prodict">
                                    <a
                                            href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                                </h3>

                                <!-- price -->
                                <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                                <!-- cart -->
                                <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                    <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                       data-product_id="<?php echo $product_id->product_id ?>">
                                        <span>افزودن به سبد خرید</span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>

            <h1 class="accordion_m">بازی های پیشنهادی ماه سوم</h1>
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
				<?php foreach ( $product_ids as $product_id ): ?>
	            <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 3 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<?php if ( $datess['status_month_3'] == 'no' ): ?>
                                <p class="msg_hidden">بازی های پیشنهادی این ماه در زمان مقرر نمایش داده می شود</p>
                                <!-- image -->
                                <div class="product-element-top">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail <?php echo( $datess['status_month_3'] == 'no' ? 'blurhooyo' : '' ); ?>">
                                </div>
                                <!-- title -->
                                <h3 class="product-title margin_prodict <?php echo( $datess['status_month_3'] == 'no' ? 'blurhooyo' : '' ); ?>">
									<?php echo get_the_title( $product_id->product_id ) ?>
                                </h3>

							<?php else: ?>
                                <!-- image -->
                                <div class="product-element-top">
                                    <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                       class="product-image-link">
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                    </a>
                                </div>

                                <!-- title -->
                                <h3 class="product-title margin_prodict">
                                    <a
                                            href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                                </h3>

                                <!-- price -->
                                <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                                <!-- cart -->
                                <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                    <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                       data-product_id="<?php echo $product_id->product_id ?>">
                                        <span>افزودن به سبد خرید</span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>

            <h1 class="accordion_m">بازی های پیشنهادی ماه چهارم</h1>
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
				<?php foreach ( $product_ids as $product_id ): ?>
	            <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 4 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<?php if ( $datess['status_month_4'] == 'no' ): ?>
                                <p class="msg_hidden">بازی های پیشنهادی این ماه در زمان مقرر نمایش داده می شود</p>
                                <!-- image -->
                                <div class="product-element-top">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail <?php echo( $datess['status_month_4'] == 'no' ? 'blurhooyo' : '' ); ?>">
                                </div>
                                <!-- title -->
                                <h3 class="product-title margin_prodict <?php echo( $datess['status_month_4'] == 'no' ? 'blurhooyo' : '' ); ?>">
									<?php echo get_the_title( $product_id->product_id ) ?>
                                </h3>

							<?php else: ?>
                                <!-- image -->
                                <div class="product-element-top">
                                    <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                       class="product-image-link">
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                    </a>
                                </div>

                                <!-- title -->
                                <h3 class="product-title margin_prodict">
                                    <a
                                            href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                                </h3>

                                <!-- price -->
                                <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                                <!-- cart -->
                                <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                    <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                       data-product_id="<?php echo $product_id->product_id ?>">
                                        <span>افزودن به سبد خرید</span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>

            <h1 class="accordion_m">بازی های پیشنهادی ماه پنجم</h1>
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
				<?php foreach ( $product_ids as $product_id ): ?>
	            <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 5 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<?php if ( $datess['status_month_5'] == 'no' ): ?>
                                <p class="msg_hidden">بازی های پیشنهادی این ماه در زمان مقرر نمایش داده می شود</p>
                                <!-- image -->
                                <div class="product-element-top">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail <?php echo( $datess['status_month_5'] == 'no' ? 'blurhooyo' : '' ); ?>">
                                </div>
                                <!-- title -->
                                <h3 class="product-title margin_prodict <?php echo( $datess['status_month_5'] == 'no' ? 'blurhooyo' : '' ); ?>">
									<?php echo get_the_title( $product_id->product_id ) ?>
                                </h3>

							<?php else: ?>
                                <!-- image -->
                                <div class="product-element-top">
                                    <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                       class="product-image-link">
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                    </a>
                                </div>

                                <!-- title -->
                                <h3 class="product-title margin_prodict">
                                    <a
                                            href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                                </h3>

                                <!-- price -->
                                <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                                <!-- cart -->
                                <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                    <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                       data-product_id="<?php echo $product_id->product_id ?>">
                                        <span>افزودن به سبد خرید</span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>

            <h1 class="accordion_m">بازی های پیشنهادی ماه ششم</h1>
            <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
				<?php foreach ( $product_ids as $product_id ): ?>
	            <?php if(!empty($product_id->statistic_ref_id)): ?>
					<?php if ( $product_id->month == 6 ): ?>
                        <div class="product-grid-item product woodmart-hover-standard  col-md-3 col-sm-4 col-6 first  type-product post-36374 status-publish first instock product_cat-672 product_cat-673 product_cat-585 has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<?php if ( $datess['status_month_6'] == 'no' ): ?>
                                <p class="msg_hidden">بازی های پیشنهادی این ماه در زمان مقرر نمایش داده می شود</p>
                                <!-- image -->
                                <div class="product-element-top">
                                    <img width="300" height="300"
                                         src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail <?php echo( $datess['status_month_6'] == 'no' ? 'blurhooyo' : '' ); ?>">
                                </div>
                                <!-- title -->
                                <h3 class="product-title margin_prodict <?php echo( $datess['status_month_6'] == 'no' ? 'blurhooyo' : '' ); ?>">
									<?php echo get_the_title( $product_id->product_id ) ?>
                                </h3>

							<?php else: ?>
                                <!-- image -->
                                <div class="product-element-top">
                                    <a href="<?php echo get_the_permalink( $product_id->product_id ) ?>"
                                       class="product-image-link">
                                        <img width="300" height="300"
                                             src="<?php echo get_the_post_thumbnail_url( $product_id->product_id ) ?>"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
                                    </a>
                                </div>

                                <!-- title -->
                                <h3 class="product-title margin_prodict">
                                    <a
                                            href="<?php echo get_the_permalink( $product_id->product_id ) ?>"><?php echo get_the_title( $product_id->product_id ) ?></a>
                                </h3>

                                <!-- price -->
                                <span class="price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?php echo number_format( get_post_meta( $product_id->product_id, '_regular_price', true ) ); ?>&nbsp;
                                    <span class="woocommerce-Price-currencySymbol">تومان</span>
                                </bdi>
                            </span>
                        </span>

                                <!-- cart -->
                                <div class="woodmart-add-btn wd-add-btn-replace margin_btn_bottom">
                                    <a href="?add-to-cart=<?php echo $product_id->product_id ?>"
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop"
                                       data-product_id="<?php echo $product_id->product_id ?>">
                                        <span>افزودن به سبد خرید</span>
                                    </a>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>

            </div>
        </main><!-- #main -->
    </div>


    <!-- Tasviri-fazai -->
    <h1>بررسی نتیجه تست</h1>
    <div class="woodmart-spacing-10 row grid-columns-4">
        <div class="kharid_hoshmandane col-12">
            <h2 class="p-iner-natije">خرید هوشمندانه اسباب‌بازی</h2>
            <p class="p-inner-natije">
                هدف از انجام این تست، کمک به شما عزیزان برای خرید هوشمندانه اسباب‌بازی متناسب با گروه سنی، توانایی‌ها و
                هوش‌هاب فرزندان‌تونه. باتوجه به نتیجه‌ی تست، اسباب‌بازی‌های متناسب با علایق و هوش‌های فرزندتون، به شما
                پیشنهاد داده‌ می‌شه تا بتونین راحت‌تر و مطمئن‌تر، مناسب‌ترین اسباب‌بازی رو برای کودک‌تون تهیه‌کنین. این
                تست توسط تیم مشاوره هویو زیر نظر روان‌شناس تهیه شده و شما می‌تونین در صورت داشتن سوال یا نیاز به دریافت
                مشاوره بیشتر با ما تماس بگیرین.
                شماره تماس: ۰۲۱۲۸۴۲۴۰۱۸
                <br>
                توجه داشته باشین که هر کودک از هر هوش‌ به میزان متفاوتی بهره‌منده و در نهایت ترکیب هوش‌های مختلف
                توانمندی‌های متفاوتی رو در کودکان ایجاد می‌کنه. پس نسبت دادن ویژگی‌هایی مثل باهوش و بااستعداد یا ناتوان
                و بی‌استعداد به هر کودک نسبت به بقیه کودکان و مقایسه آن‌ها، اصلا کار صحیحی نیست و اثرات نامطلوبی روی
                عزت‌نفس و اعتماد‌به‌نفس اونا داره.
            </p>
        </div>
    </div>



    <div class="hidden_desktop woodmart-spacing-10 row grid-columns-4">
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Spatial">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-1.png">
                            <div class="iner-point"><?php echo $info_user['pic']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>تصویری فضایی</p></div>
                    </div>
                </div>
                <div class="panel_m products elements-grid align-items-start woodmart-products-holder  woodmart-spacing-10 pagination-pagination row grid-columns-4">
                    سلام
                </div>
                <div class="secound-tasviri">
                    <p>هوش تصویری-فضایی یعنی درک و تفسیر تصاویر و توان تصور یا ایجاد چیدمان مجدد اشیاء. این هوش با تجسم
                        و تصویرسازی از اشکال و اجسام سروكار دارد. افرادی كه در هوش تصویری-فضایی قوی هستند، در تجسم احجام
                        و پدیده‌ها توانایی بسیار بالایی دارند. این افراد معمولا در جهت‌یابی، استفاده از نقشه، درک
                        نمودارها، تصاویر و فیلم‌ها عملکرد خوبی دارند.
                        این افراد استعداد بالایی در تصویرسازی، تجسم فضایی، طراحی و نقاشی داشته و اغلب به خوبی تصاویر را
                        درک و تفسیر می‌کنند.
                        افراد با هوش تصویری-فضایی بالا معمولا حافظه‌ی دیداری بسیار مطلوبی داشته و از این طریق بسیاری از
                        مطالب را به خاطر می‌سپرند.
                    </p>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Math">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-8.png">
                            <div class="iner-point"><?php echo $info_user['logical']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>ریاضی منطقی</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش منطقی-ریاضی با منطق، تفکر انتزاعی، استدلال، درک اعداد و تفکر انتقادی مرتبط است. افراد با هوش
                        منطقی-ریاضی بالا توانایی بالایی در یافتن الگوها و استنتاج، درک اصول زیربنایی مسائل و درک روابط
                        علی و معلولی پیچیده دارند.
                        این افراد به طور طبیعی در ریاضیات، شطرنج، برنامه‌ریزی كامپیرتر و سایر فعالیت‌های منطقی و عددی
                        بهتر از سایرین عمل می‌كنند.
                        این دسته از کودکان غالباً کنجکاو، متفکر، تحلیل‌گر بوده و در استدلال، شناسایی الگوها و تحلیل
                        منطقی مسائل مختلف قوی هستند. این افراد به تفکر درباره مفهوم اعداد، روابط و الگوها، تفکر درباره
                        ایده‌های انتزاعی، انجام آزمایش‌های علمی و انجام محاسبات پیچیده علاقه‌مندند.
                    </p>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Intrapersonal">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-7.png">
                            <div class="iner-point"><?php echo $info_user['miyanFardi']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">

                        <div class="matn-tasviri-natije"><p>میان فردی</p></div>

                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش بین‌فردی یعنی توانایی ارتباط برقرار كردن با دیگران و فهم آن‌ها. کسانی که هوش بین‌فردی قوی
                        دارند، معمولا روحیه برون‌گرا داشته و در ارزیابی و درک احساسات، انگیزه‌ها و تمایلات دیگران و
                        تعامل با آن‌ها خوب عمل می‌کنند.
                        آن‌ها سعی می‌كنند مسائل را از نقطه‌نظر دیگران نظاره كنند تا دریابند آنان چگونه می‌اندیشند و
                        احساس می‌كنند. این افراد معمولا از مهارت‌های كلامی و غیركلامی در ارتباط برقرار كردن با دیگران
                        استفاده کرده، به طور مؤثری با دیگران تعامل داشته و با آن‌ها همدردی می‌كنند.
                        آن‌ها از طریق فعالیت گروهی، مطالب و موضوعات مختلف را بهتر وسریع‌تر یاد می‌گیرند و اغلب از بحث و
                        گفت‌وگو لذت می‌برند .
                    </p>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Interpersonal">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-6.png">
                            <div class="iner-point"><?php echo $info_user['daronFardi']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">

                        <div class="matn-tasviri-natije"><p>درون فردی</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش درون فردی یعنی توانایی درك خود و آگاه بودن از حالات درونی و فردی. در واقع این هوش با
                        فعالیت‌های درون گرایانه و خودشناسی درارتباط است. آن‌هایی كه در این هوش قوی هستند، نسبت به
                        احساسات، هیجان‌ها و انگیزه‌های خود، آگاهی خوبی دارند. این افراد از خوداندیشی، رویاپردازی و
                        ارزیابی نقاط قوت و ضعف خود لذت می‌برند.
                        این افراد معمولا دارای روحیه‌ی درون‌گرا هستند و ترجیح می‌دهند كه به تنهایی به فعالیت بپردازند.
                        آن‌ها اغلب علاقه‌ی زیادی به مطالعه و جست‌وجوی تفكر محور، همچون فلسفه دارند و زمانی كه به آن‌ها
                        اجازه‌داده‌شود تا روی موضوع خود تمركز داشته باشند، آن مطلب را بهتر می آموزند.
                    </p>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Verbal">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-4.png">
                            <div class="iner-point"><?php echo $info_user['kalami']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>کلامی زبانی</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش کلامی-زبانی با مسائلی از قبیل توانایی درک و استفاده مناسب از كلمات، صحبت كردن و نوشتن سرو كار
                        دارد. افراد با هوش کلامی-زبانی بالا در مهارت خواندن، نوشتن داستان گوئی و به خاطر سپردن لغات و
                        اصطلاحات عملكرد خوبی از خود نشان می‌دهند.
                        آن‌ها همچنین مهارت‌های شنیداری تكامل یافته داشته‌ و پتانسیل خوبی در سخنوری دارند. این کودکان
                        بسیار خوش صحبت هستند و به راحتی می‌توانند در جمع صحبت کنند.
                        آنان از طریق خواندن، نوشتن، یادداشت‌برداری، گوش كردن به سخنرانی‌ها و بحث ‌و گفت‌وگو مطالب را
                        بهتر و سریع‌تر می‌آموزند. حافظه کلامی نسبتا خوبی دارند و به راحتی می‌توانند سایر زبان‌ها را نیز
                        یاد بگیرند.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Nature">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-3.png">
                            <div class="iner-point"><?php echo $info_user['naturalist']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>طبیعت گرا</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش طبیعت‌گرایی با طبیعت و ارتباط دادن اطلاعات به محیط مرتبط است. افراد با هوش طبیعت‌گرایی قوی،
                        حساسیت بالایی به طبیعت و محیط زندگی‌شان دارند و حتی از تغییرات نامحسوس در محیط خود آگاه
                        می‌باشند.
                        این افراد معمولا بیشتر از بقیه با طبیعت هماهنگ‌اند و توانایی پرورش گونه‌های مختلف جانوری و گیاهی
                        را دارند. آن‌ها در تشخیص پوشش‌های گیاهی و جانوری و مواردی مثل سنگ‌ها و ابرها مهارت دارند و ممكن
                        است تغییرات آب‌وهوا و سایر عملكردهای مشابه را نیز تشخیص دهند.
                        آنان در شناسایی و طبقه‌بندی گونه‌های مختلف مهارت دارند و زمانی كه مطلبی شامل جست‌وجو، تجزیه و
                        تحلیل و دارای ارتباطی نزدیك با طبیعت باشد، بهتر آن را یاد می‌گیرند .
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri Kinetic">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-5.png">
                            <div class="iner-point"><?php echo $info_user['motion']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>حرکتی جنبشی</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش حرکتی-جنبشی یعنی توانایی كنترل ماهرانه‌ی بدن. این هوش با حركت و انجام فعالیت‌های فیزیکی
                        سروكار دارد. افراد با هوش حرکتی-جنبشی بالا درك خوبی از حس تعادل و هماهنگی چشم و دست دارند و
                        حرکات فیزیکی پیچیده را به خوبی انجام می‌دهند. این افراد معمولاّ در فعالیت‌هایی همچون ورزش، رقص
                        و... مهارت پیدا می‌كنند و اغلب فعالیت‌هایی را ترجیح می‌دهند كه توأم با حركات جسمی باشد.
                        این افراد، معمولاْ از طریق فعالیت‌های جسمی بهتر یاد می‌گیرند. آن‌ها امور مختلف را از طریق
                        فعالیت‌های بدن به خاطر می‌آورند و علاقه‌ی چندانی به به‌یاد‌آورن مطالب از طریق حافظه‌ی كلامی یا
                        حافظه‌ی تصویری ندارند.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <div class="iner-tasviri music">
                <div class="top-tasviri">
                    <div class="circle-tasviri">
                        <div class="circlix-natije">
                            <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-2.png">
                            <div class="iner-point"><?php echo $info_user['music']; ?></div>
                        </div>
                    </div>
                    <div class="matn-tasviri">
                        <div class="matn-tasviri-natije"><p>موسیقیایی</p></div>
                    </div>
                </div>
                <div class="secound-tasviri">
                    <p>هوش موسیقیایی یعنی توانایی درك و تولید صداها، ریتم‌ها و آهنگ‌ها. این هوش با موسیقی و گوش دادن به
                        آن سروكار دارد. کسانی كه دارای سطح بالایی از هوش موسیقیایی هستند، حساسیت و درک زیادی نسبت به
                        اصوات، ریتم‌ها و نت‌ها از خود نشان می‌دهند. آن‌ها معمولا پتانسیل خوبی در شناخت زیر و بمی صداها
                        داشته و این می‌تواند سرعت یادگیری آواز خواندن، نوازندگی و آهنگسازی را در آن‌ها تسریع نماید.
                        همچنین از آنجا كه مؤلفه‌های شنیداری بسیار قوی در ارتباط با این هوش وجود دارد، داشتن هوش
                        موسیقیایی بالا باعث می‌شود فرد بتواند از طریق سخنرانی، مطالب و موضوعات مختلف را بهتر یاد بگیرد و
                        از آهنگ‌ها و ریتم‌ها برای به یاد سپاری استفاده كند.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden_mobil woodmart-spacing-10 row grid-columns-4">
        <div class="box_kol">
            <h2 class="accordion_m Spatial">تصویری فضایی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-12">
                    <div class="iner-tasviri Spatial">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-1.png">
                                    <div class="iner-point"><?php echo $info_user['pic']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>تصویری فضایی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش تصویری-فضایی یعنی درک و تفسیر تصاویر و توان تصور یا ایجاد چیدمان مجدد اشیاء. این هوش
                                با
                                تجسم
                                و تصویرسازی از اشکال و اجسام سروكار دارد. افرادی كه در هوش تصویری-فضایی قوی هستند، در
                                تجسم
                                احجام
                                و پدیده‌ها توانایی بسیار بالایی دارند. این افراد معمولا در جهت‌یابی، استفاده از نقشه،
                                درک
                                نمودارها، تصاویر و فیلم‌ها عملکرد خوبی دارند.
                                این افراد استعداد بالایی در تصویرسازی، تجسم فضایی، طراحی و نقاشی داشته و اغلب به خوبی
                                تصاویر
                                را
                                درک و تفسیر می‌کنند.
                                افراد با هوش تصویری-فضایی بالا معمولا حافظه‌ی دیداری بسیار مطلوبی داشته و از این طریق
                                بسیاری
                                از
                                مطالب را به خاطر می‌سپرند.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Math">ریاضی منطقی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-12">
                    <div class="iner-tasviri Math">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-8.png">
                                    <div class="iner-point"><?php echo $info_user['logical']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>ریاضی منطقی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش منطقی-ریاضی با منطق، تفکر انتزاعی، استدلال، درک اعداد و تفکر انتقادی مرتبط است. افراد
                                با
                                هوش
                                منطقی-ریاضی بالا توانایی بالایی در یافتن الگوها و استنتاج، درک اصول زیربنایی مسائل و درک
                                روابط
                                علی و معلولی پیچیده دارند.
                                این افراد به طور طبیعی در ریاضیات، شطرنج، برنامه‌ریزی كامپیرتر و سایر فعالیت‌های منطقی و
                                عددی
                                بهتر از سایرین عمل می‌كنند.
                                این دسته از کودکان غالباً کنجکاو، متفکر، تحلیل‌گر بوده و در استدلال، شناسایی الگوها و
                                تحلیل
                                منطقی مسائل مختلف قوی هستند. این افراد به تفکر درباره مفهوم اعداد، روابط و الگوها، تفکر
                                درباره
                                ایده‌های انتزاعی، انجام آزمایش‌های علمی و انجام محاسبات پیچیده علاقه‌مندند.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Intrapersonal">میان فردی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-12">
                    <div class="iner-tasviri Intrapersonal">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-7.png">
                                    <div class="iner-point"><?php echo $info_user['miyanFardi']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">

                                <div class="matn-tasviri-natije"><p>میان فردی</p></div>

                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش بین‌فردی یعنی توانایی ارتباط برقرار كردن با دیگران و فهم آن‌ها. کسانی که هوش بین‌فردی
                                قوی
                                دارند، معمولا روحیه برون‌گرا داشته و در ارزیابی و درک احساسات، انگیزه‌ها و تمایلات
                                دیگران و
                                تعامل با آن‌ها خوب عمل می‌کنند.
                                آن‌ها سعی می‌كنند مسائل را از نقطه‌نظر دیگران نظاره كنند تا دریابند آنان چگونه
                                می‌اندیشند و
                                احساس می‌كنند. این افراد معمولا از مهارت‌های كلامی و غیركلامی در ارتباط برقرار كردن با
                                دیگران
                                استفاده کرده، به طور مؤثری با دیگران تعامل داشته و با آن‌ها همدردی می‌كنند.
                                آن‌ها از طریق فعالیت گروهی، مطالب و موضوعات مختلف را بهتر وسریع‌تر یاد می‌گیرند و اغلب
                                از
                                بحث و
                                گفت‌وگو لذت می‌برند .
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Interpersonal">درون فردی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="iner-tasviri Interpersonal">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-6.png">
                                    <div class="iner-point"><?php echo $info_user['daronFardi']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">

                                <div class="matn-tasviri-natije"><p>درون فردی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش درون فردی یعنی توانایی درك خود و آگاه بودن از حالات درونی و فردی. در واقع این هوش با
                                فعالیت‌های درون گرایانه و خودشناسی درارتباط است. آن‌هایی كه در این هوش قوی هستند، نسبت
                                به
                                احساسات، هیجان‌ها و انگیزه‌های خود، آگاهی خوبی دارند. این افراد از خوداندیشی، رویاپردازی
                                و
                                ارزیابی نقاط قوت و ضعف خود لذت می‌برند.
                                این افراد معمولا دارای روحیه‌ی درون‌گرا هستند و ترجیح می‌دهند كه به تنهایی به فعالیت
                                بپردازند.
                                آن‌ها اغلب علاقه‌ی زیادی به مطالعه و جست‌وجوی تفكر محور، همچون فلسفه دارند و زمانی كه به
                                آن‌ها
                                اجازه‌داده‌شود تا روی موضوع خود تمركز داشته باشند، آن مطلب را بهتر می آموزند.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Verbal">کلامی زبانی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="iner-tasviri Verbal">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-4.png">
                                    <div class="iner-point"><?php echo $info_user['kalami']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>کلامی زبانی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش کلامی-زبانی با مسائلی از قبیل توانایی درک و استفاده مناسب از كلمات، صحبت كردن و نوشتن
                                سرو
                                كار
                                دارد. افراد با هوش کلامی-زبانی بالا در مهارت خواندن، نوشتن داستان گوئی و به خاطر سپردن
                                لغات
                                و
                                اصطلاحات عملكرد خوبی از خود نشان می‌دهند.
                                آن‌ها همچنین مهارت‌های شنیداری تكامل یافته داشته‌ و پتانسیل خوبی در سخنوری دارند. این
                                کودکان
                                بسیار خوش صحبت هستند و به راحتی می‌توانند در جمع صحبت کنند.
                                آنان از طریق خواندن، نوشتن، یادداشت‌برداری، گوش كردن به سخنرانی‌ها و بحث ‌و گفت‌وگو
                                مطالب را
                                بهتر و سریع‌تر می‌آموزند. حافظه کلامی نسبتا خوبی دارند و به راحتی می‌توانند سایر زبان‌ها
                                را
                                نیز
                                یاد بگیرند.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Nature">طبیعت گرا</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="iner-tasviri Nature">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-3.png">
                                    <div class="iner-point"><?php echo $info_user['naturalist']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>طبیعت گرا</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش طبیعت‌گرایی با طبیعت و ارتباط دادن اطلاعات به محیط مرتبط است. افراد با هوش
                                طبیعت‌گرایی
                                قوی،
                                حساسیت بالایی به طبیعت و محیط زندگی‌شان دارند و حتی از تغییرات نامحسوس در محیط خود آگاه
                                می‌باشند.
                                این افراد معمولا بیشتر از بقیه با طبیعت هماهنگ‌اند و توانایی پرورش گونه‌های مختلف جانوری
                                و
                                گیاهی
                                را دارند. آن‌ها در تشخیص پوشش‌های گیاهی و جانوری و مواردی مثل سنگ‌ها و ابرها مهارت دارند
                                و
                                ممكن
                                است تغییرات آب‌وهوا و سایر عملكردهای مشابه را نیز تشخیص دهند.
                                آنان در شناسایی و طبقه‌بندی گونه‌های مختلف مهارت دارند و زمانی كه مطلبی شامل جست‌وجو،
                                تجزیه
                                و
                                تحلیل و دارای ارتباطی نزدیك با طبیعت باشد، بهتر آن را یاد می‌گیرند .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m Kinetic">حرکتی جنبشی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="iner-tasviri Kinetic">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-5.png">
                                    <div class="iner-point"><?php echo $info_user['motion']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>حرکتی جنبشی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش حرکتی-جنبشی یعنی توانایی كنترل ماهرانه‌ی بدن. این هوش با حركت و انجام فعالیت‌های
                                فیزیکی
                                سروكار دارد. افراد با هوش حرکتی-جنبشی بالا درك خوبی از حس تعادل و هماهنگی چشم و دست
                                دارند و
                                حرکات فیزیکی پیچیده را به خوبی انجام می‌دهند. این افراد معمولاّ در فعالیت‌هایی همچون
                                ورزش،
                                رقص
                                و... مهارت پیدا می‌كنند و اغلب فعالیت‌هایی را ترجیح می‌دهند كه توأم با حركات جسمی باشد.
                                این افراد، معمولاْ از طریق فعالیت‌های جسمی بهتر یاد می‌گیرند. آن‌ها امور مختلف را از
                                طریق
                                فعالیت‌های بدن به خاطر می‌آورند و علاقه‌ی چندانی به به‌یاد‌آورن مطالب از طریق حافظه‌ی
                                كلامی
                                یا
                                حافظه‌ی تصویری ندارند.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box_kol">
            <h2 class="accordion_m music">موسیقیایی</h2>
            <div class="accordion_hosh panel_m">
                <div class="col-md-3 col-sm-4 col-12">
                    <div class="iner-tasviri music">
                        <div class="top-tasviri">
                            <div class="circle-tasviri">
                                <div class="circlix-natije">
                                    <img src="https://hooyo.ir/wp-content/uploads/2020/08/Asset-2.png">
                                    <div class="iner-point"><?php echo $info_user['music']; ?></div>
                                </div>
                            </div>
                            <div class="matn-tasviri">
                                <div class="matn-tasviri-natije"><p>موسیقیایی</p></div>
                            </div>
                        </div>
                        <div class="secound-tasviri">
                            <p>هوش موسیقیایی یعنی توانایی درك و تولید صداها، ریتم‌ها و آهنگ‌ها. این هوش با موسیقی و گوش
                                دادن
                                به
                                آن سروكار دارد. کسانی كه دارای سطح بالایی از هوش موسیقیایی هستند، حساسیت و درک زیادی
                                نسبت به
                                اصوات، ریتم‌ها و نت‌ها از خود نشان می‌دهند. آن‌ها معمولا پتانسیل خوبی در شناخت زیر و بمی
                                صداها
                                داشته و این می‌تواند سرعت یادگیری آواز خواندن، نوازندگی و آهنگسازی را در آن‌ها تسریع
                                نماید.
                                همچنین از آنجا كه مؤلفه‌های شنیداری بسیار قوی در ارتباط با این هوش وجود دارد، داشتن هوش
                                موسیقیایی بالا باعث می‌شود فرد بتواند از طریق سخنرانی، مطالب و موضوعات مختلف را بهتر یاد
                                بگیرد و
                                از آهنگ‌ها و ریتم‌ها برای به یاد سپاری استفاده كند.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- buttons -->
    <div class="button-class-natije">
        <button class="buuton-natije"><a href="https://hooyo.ir/my-account/">پروفایل من</a></button>
        <button class="buuton-natije"><a href="https://hooyo.ir">بازگشت به صفحه اصلی</a></button>
    </div>
</div>
<!-- scripts -->
<script>
    var acc = document.getElementsByClassName("accordion_m");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active_m");
            var panel_m = this.nextElementSibling;
            if (panel_m.style.maxHeight) {
                panel_m.style.maxHeight = null;
            } else {
                panel_m.style.maxHeight = panel_m.scrollHeight + "px";
            }
        });
    }
</script>
