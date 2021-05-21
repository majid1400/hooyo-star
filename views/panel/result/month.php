<?php $m = sanitize_text_field($_GET['month']) ?>

<div class="container">
    <div class="row">
        <div class="card-body">

            <br>

            <div class="row">
                <h5 class="col-12 center card-title mb-2 text-bold">ماه <?= $m ?> قراره چه کار کنیم؟</h5>
            </div>
            <div class="row">
                <p>
                    این ماه قراره روی هوش های <span class="ho"><?= $focus_month["m" . $m][0] ?></span> و <span
                            class="ho"><?= $focus_month["m" . $m][1] ?></span> <span><?= $result->child_name ?></span>
                    جان
                    تمرکز کنیم، چون هوش <span><?= $focus_month["m" . $m][0] ?></span> خوبی داره و باید سعی کنیم این هوش
                    رو
                    قوی نگه داریم، علاوه بر این خوبه اگه بتونیم یه مقدار هوش
                    <span><?= $focus_month["m" . $m][1] ?></span>
                    <span><?= $result->child_name ?></span> رو هم قوی تر کنیم.
                </p>
                <p>
                    همه ی پیشنهادها بر همین اساس براتون انتخاب شده و لازمه که با این هدف استفاده یا انجام بشن تا نتیجه
                    مطلوب رو داشته باشن.
                </p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-3">

                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-5 align-items-center">
                        <p class="col-12 karshenas" style="text-align: center">
                            در صورت نیاز به توضیحات بیشتر با کارشناس یا روانشناس خود در ارتباط باشین.
                            <img src="<?= HSP_ASSET_URL ?>icons/chat.png" alt="chat" width="25"
                                 height="25">
                        </p>
                    </div>

                </div>
            </div>

            <!-- games -->
            <div class="row">
                <h5 class="col-12 center card-title mb-2 text-bold">اسباب بازی های پیشنهادی</h5>
            </div>
            <br>
            <div class="row">
                <?php $games = $toys["games"]; ?>
                <br>
                <br>
                <?php foreach ($games as $game): ?>
                    <?php if ($game->month == $m): ?>
                        <div class="col-lg-2">
                            <a href="<?= $game->permalink ?>">
                                <div class="dashboard">
                                    <img src="<?= $game->img ?>" width="80" height="80">
                                    <p class="p-month-titr"><?= $game->title ?></p>
                                    <p class="p-month"><?= $game->price ?> تومان</p>
                                    <span class="btn-more-month">خرید و اطلاعات بیشتر</span>

                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- end games -->


            <!-- books -->
            <div class="row">
                <h5 class="col-12 center card-title mb-2 text-bold">کتاب های پیشنهادی</h5>
            </div>
            <br>
            <div class="row">
                <?php $books = $toys["books"]; ?>
                <br>
                <br>
                <?php foreach ($books as $book): ?>
                    <?php if ($book->month == $m): ?>
                        <div class="col-lg-2">
                            <a href="<?= $book->permalink ?>">
                                <div class="dashboard">
                                    <img src="<?= $book->img ?>" width="80" height="80">
                                    <p class="p-month-titr"><?= $book->title ?></p>
                                    <p class="p-month"><?= $book->price ?> تومان</p>
                                    <span class="btn-more-month">خرید و اطلاعات بیشتر</span>

                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- end books -->


            <!-- blogs -->
            <div class="row">
                <h5 class="col-12 center card-title mb-2 text-bold">مقالات پیشنهادی</h5>
            </div>
            <br>
            <div class="row">
                <?php $blogs = $toys["blogs"]; ?>
                <br>
                <br>
                <?php foreach ($blogs as $blog): ?>
                    <?php if ($blog->month == $m): ?>
                        <div class="col-lg-2">
                            <a href="<?= $blog->permalink ?>">
                                <div class="dashboard">
                                    <img src="<?= $blog->img ?>" width="80" height="80">
                                    <p class="p-month-titr"><?= $blog->title ?></p>
                                    <p class="p-month"><?= $blog->price ?> تومان</p>
                                    <span class="btn-more-month">خرید و اطلاعات بیشتر</span>

                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- end blogs -->

        </div>
    </div>
</div>



