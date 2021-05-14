<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="card-title mb-2 text-bold">داشبورد کاربر</h5>

            <div class="row">
                <?php foreach ($childs as $item): ?>
                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/bar-graph.svg" alt="sd" width="100" height="100">
                            <p>نتیجه تست <?= $item->child_name ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/info.svg" alt="sd" width="100" height="100">
                        <p>راهنمای اشتراک</p>
                    </div>

                </div>
                <div class="col">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/system-update.svg" alt="sd" width="100" height="100">
                        <p>ارتقاء حساب کاربری</p>
                    </div>

                </div>
                <div class="col">
                    <div class="dashboard">
                        <img src="<?php echo HSP_ASSET_URL ?>icons/edit.svg" alt="sd" width="100" height="100">
                        <p>ویرایش اطلاعات</p>
                    </div>

                </div>


            </div>

            <div class="space">
                <div class="row">
                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/chat-bubble.svg" alt="sd" width="100"
                                 height="100">
                            <p>پیام های من</p>
                        </div>

                    </div>

                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/discount-tag.svg" alt="sd" width="100"
                                 height="100">
                            <p>تخفیف های من</p>
                        </div>

                    </div>
                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/received.svg" alt="sd" width="100"
                                 height="100">
                            <p>سفارش های من</p>
                        </div>

                    </div>
                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/wallet.svg" alt="sd" width="100"
                                 height="100">
                            <p>کیف پول من</p>
                        </div>

                    </div>
                    <div class="col">
                        <div class="dashboard">
                            <img src="<?php echo HSP_ASSET_URL ?>icons/log-out.svg" alt="sd" width="100"
                                 height="100">
                            <p>خروج</p>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>