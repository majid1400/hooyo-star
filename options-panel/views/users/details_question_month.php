<div class="row">
    <div class="col">
        <div class="tabs">
			<?php for ( $i = 1; $i <= 6; $i ++ ): ?>
                <div class="tab">
                    <input type="checkbox" id="chck<?php echo $i ?>">
                    <label class="tab-label" for="chck<?php echo $i ?>">ماه <?php echo $i ?></label>
                    <div class="tab-content">
						<?php $games = $product[ 'month_' . ( $i - 1 ) ]['games']; ?>
						<?php $books = $product[ 'month_' . ( $i - 1 ) ]['books']; ?>
						<?php $blogs = $blogs_s[ 'month_' . ( $i - 1 ) ]['blogs']; ?>
						<?php $result_games = $results[ 'month_' . ( $i ) ]['games']; ?>
						<?php $result_books = $results[ 'month_' . ( $i ) ]['books']; ?>
						<?php $result_blogs = $results[ 'month_' . ( $i ) ]['blogs']; ?>

                        <div class="fb fb__1">
                            <div class="result_month fb fb__1_2">
                                <h3>نتیجه</h3>
                                <div class="fb fb__1">
                                    <div class="game fb fb__1_2">
                                        <h3>بازی</h3>
										<?php if ( empty( $result_games ) ): ?>
											<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
										<?php endif; ?>
										<?php foreach ( $result_games as $result_game ): ?>
                                            <input type="checkbox"
                                                   value="<?php echo $result_game['id'] ?>"
                                                   name="d_<?php echo $i ?>[]">
                                            <a class="<?php echo( $result_game['stock'] ? 'black' : 'red' ) ?>"
                                               href="<?php echo $result_game['permalink'] ?>">
												<?php echo $result_game['title'] ?>
												<?php echo( $result_game['stock'] ?: '(ناموجود)' ) ?>
                                            </a>
                                            <br>
										<?php endforeach; ?>
                                    </div>
                                    <div class="game fb fb__1_2">
                                        <h3>کتاب</h3>
										<?php if ( empty( $result_books ) ): ?>
											<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
										<?php endif; ?>
										<?php foreach ( $result_books as $result_book ): ?>
                                            <input type="checkbox"
                                                   value="<?php echo $result_book['id'] ?>"
                                                   name="d_<?php echo $i ?>[]">
                                            <a class="<?php echo( $result_book['stock'] ? 'black' : 'red' ) ?>"
                                               href="<?php echo $result_book['permalink'] ?>">
												<?php echo $result_book['title'] ?>
												<?php echo( $result_book['stock'] ?: '(ناموجود)' ) ?>
                                            </a>
                                            <br>
										<?php endforeach; ?>
                                    </div>
                                    <div class="game fb fb__1_2">
                                        <h3>بلاگ</h3>
										<?php if ( empty( $result_blogs ) ): ?>
											<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
										<?php endif; ?>
										<?php foreach ( $result_blogs as $result_blog ): ?>
                                            <input type="checkbox"
                                                   value="<?php echo $result_blog['id'] ?>"
                                                   name="d_<?php echo $i ?>[]">
                                            <a class="black"
                                               href="<?php echo $result_blog['permalink'] ?>">
												<?php echo $result_blog['title'] ?>
                                            </a>
                                            <br>
										<?php endforeach; ?>
                                    </div>
                                </div>
                                <p class="submit">
                                    <button type="submit" name="delete_<?php echo $i ?>" class="button button-primary">
                                        حذف
                                    </button>
                                </p>
                            </div>
                        </div>

                        <div class="fb fb__1">

                            <div class="game fb fb__1_2">
                                <h3>بازی</h3>
								<?php if ( empty( $games ) ): ?>
									<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
								<?php endif; ?>
								<?php foreach ( $games as $game ): ?>
                                    <input type="checkbox" value="<?php echo $game['id'] . ',' . $game['cat'] ?>"
                                           name="m_<?php echo $i ?>[]"
										<?php foreach ( $result_games as $b ): ?>
											<?php echo ( $game['id'] != $b['id'] ) ?: "checked"; ?>
										<?php endforeach; ?>
                                    >
                                    <a class="<?php echo( $game['stock'] ? 'black' : 'red' ) ?>"
                                       href="<?php echo $game['permalink'] ?>">
										<?php echo $game['title'] ?>
										<?php echo( $game['stock'] ?: '(ناموجود)' ) ?>
                                    </a>
                                    <hr>
								<?php endforeach; ?>
                            </div>

                            <div class="book fb fb__1_3">
                                <h3>کتاب</h3>
								<?php if ( empty( $books ) ): ?>
									<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
								<?php endif; ?>
								<?php foreach ( $books as $book ): ?>
                                    <input type="checkbox" value="<?php echo $book['id'] . ',' . $book['cat'] ?>"
                                           name="m_<?php echo $i ?>[]"
										<?php foreach ( $result_books as $b ): ?>
											<?php echo ( $book['id'] != $b['id'] ) ?: "checked"; ?>
										<?php endforeach; ?>
                                    >
                                    <a class="<?php echo( $book['stock'] ? 'black' : 'red' ) ?>"
                                       href="<?php echo $book['permalink'] ?>">
										<?php echo $book['title'] ?>
										<?php echo( $book['stock'] ?: '(ناموجود)' ) ?>
                                    </a>
                                    <hr>
								<?php endforeach; ?>
                            </div>

                            <div class="blog fb fb__1_4">
                                <h3>بلاگ</h3>
								<?php if ( empty( $blogs ) ): ?>
									<?php echo 'داده ای برای نمایش وجود ندارد'; ?>
								<?php endif; ?>
								<?php foreach ( $blogs as $blog ): ?>
                                    <input type="checkbox" value="<?php echo $blog['id'] . ',' . $blog['cat'] ?>"
                                           name="m_<?php echo $i ?>[]"
										<?php foreach ( $result_blogs as $b ): ?>
											<?php echo ( $blog['id'] != $b['id'] ) ?: "checked"; ?>
										<?php endforeach; ?>
                                    >
                                    <a class="black"
                                       href="<?php echo $blog['permalink'] ?>">
										<?php echo $blog['title'] ?>
                                    </a>
                                    <hr>
								<?php endforeach; ?>
                            </div>


                        </div>

                        <p class="submit">
                            <button type="submit" name="save_<?php echo $i ?>" class="button button-primary">ذخیره
                                تغییرات
                            </button>
                        </p>
                    </div>
                </div>
			<?php endfor; ?>
        </div>
    </div>
</div>