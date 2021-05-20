<div class="col-lg-10">

    <div class="card-body">

        <div class="row justify-content-md-center">
            <h5 class="col-12 center card-title mb-2 text-bold">مامان/بابای <?= $childs[0]->child_name ?></h5>
        </div>

        <div class="row justify-content-md-center">
            <h6 class="col-12 center card-title mb-2 text-bold"><?= wp_get_current_user()->user_login ?></h6>
        </div>
        <br>

        <div class="container">
            <div class="row col-12 justify-content-md-center">
                <?php foreach ($childs as $item): ?>
                    <div class="col-6 col-lg-2-mb">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/bar-graph.svg" alt="sd" width="80" height="80">
                            <p>نتیجه تست <?= $item->child_name ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/info.svg" alt="sd" width="80" height="80">
                        <p>راهنمای اشتراک</p>
                    </div>
                </div>
                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/system-update.svg" alt="sd" width="80" height="80">
                        <p style="font-size: 13.7px;">ارتقاء حساب کاربری</p>
                    </div>

                </div>
                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/edit.svg" alt="sd" width="80" height="80">
                        <p>ویرایش اطلاعات</p>
                    </div>

                </div>


                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/chat-bubble.svg" alt="sd" width="80"
                             height="80">
                        <p>پیام های من</p>
                    </div>

                </div>

                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/discount-tag.svg" alt="sd" width="80"
                             height="80">
                        <p>تخفیف های من</p>
                    </div>

                </div>
                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/received.svg" alt="sd" width="80"
                             height="80">
                        <p>سفارش های من</p>
                    </div>

                </div>
                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/wallet.svg" alt="sd" width="80"
                             height="80">
                        <p>کیف پول من</p>
                    </div>

                </div>
                <div class="col-6 col-lg-2-mb">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/log-out.svg" alt="sd" width="80"
                             height="80">
                        <p>خروج</p>
                    </div>

                </div>


            </div>

        </div>

    </div>

</div>