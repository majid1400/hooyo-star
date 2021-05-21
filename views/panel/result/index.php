<div class="row justify-content-md-center">
    <div class="card-body">

        <br>

        <div class="row justify-content-md-center">
            <h5 class="col-12 center card-title mb-2 text-bold">نتیجه تست <?= $result->child_name ?></h5>
        </div>

        <br>

        <div class="row">

            <?php for ($i = 1; $i <= 6; $i++): ?>
                <div class="col-lg-1-mb">
                    <a href="<?= add_query_arg(["month" => $i]) ?>">
                    <div class="dashboard">
                        <p>بازی، کتاب، مقاله، اسباب‌بازی برای ماه</p>
                        <img src="<?php echo HSP_ASSET_URL ?>icons/number-<?= $i ?>.svg" alt="sd" width="80"
                             height="80">
                    </div>
                    </a>
                </div>

            <?php endfor; ?>

            <div class="col-lg-4">
                <div class="dashboard">
                    <p>بازی، کتاب، مقاله، اسباب‌بازی برای ماه</p>
                    <img src="<?php echo HSP_ASSET_URL ?>icons/number-1.svg" alt="sd" width="80" height="80">
                </div>
            </div>

        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <h5 class="col-12 center card-title mb-2 text-bold">تفسیر و توضیح نتیجه</h5>
                </div>
                <div class="row">
                    <p class="col-12 tafsit">
                        هدف از انجام این تست، کمک به شما عزیزان برای خرید هوشمندانه اسباب بازی متناسب با گروه سنی،
                        توانایی ها و هوش های فرزندان تونه. با توجه به نتیجه ی تست، اسباب بازی های متناسب با علایق و هوش
                        های فرزندتون، به شما پیشنهاد داده میشه تا بتونین راحت تر و مطمئن تر، مناسب ترین اسباب بازی رو
                        برای کودک تون تهیه کنین. این تست توسط تیم مشاوره هویو زیر نظر روانشناس تهیه شده و شما می تونین
                        در صورت داشتن سوال یا نیاز به دریافت مشاوره بیشتر با ما تماس بگیرین. شماره تماس: 02128424018
                        <br>
                        توجه داشته باشین که هر کودک از هر هوش به میزان متفاوتی بهره مند و در نهایت ترکیب هوش های مختلف
                        توانمندی های متفاوتی رو در کودکان ایجاد می کنه. پس نسبت دادن ویژگی هایی مثل با هوش و با استعداد
                        یا ناتوان و بی استعداد به هر کودک نسبت به بقیه کودکان و مقایسه آن ها، اصلا کار صحیحی نیست و
                        اثرات نامطلوبی روی عزت نفس و اعتماد به نفس اونا داره.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <p class="col-12 karshenas">
                        در صورت نیاز به توضیحات بیشتر با کارشناس یا روانشناس خود در ارتباط باشین.
                        <img src="<?= HSP_ASSET_URL ?>icons/chat.png" alt="chat" width="25"
                             height="25">
                    </p>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row justify-content-md-center">

            <?php $housh = ['کلامی زبان', 'منطقی ریاضی', 'موسیقیایی', 'میان فردی', 'طبیعت گرا', 'درون فردی', 'حرکتی جنبشی', 'تصویری فضایی'] ?>
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <div class="col-lg-1-mb">
                    <div class="dashboard">

                        <img src="<?php echo HSP_ASSET_URL ?>icons/number-<?= $i ?>.svg" alt="sd" width="80"
                             height="80">
                        <p><?= $housh[$i - 1] ?></p>
                        <span class="btn-more">مطالعه بیشتر</span>
                    </div>
                </div>

            <?php endfor; ?>


        </div>


    </div>
</div>



