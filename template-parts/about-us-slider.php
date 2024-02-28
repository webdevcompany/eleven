<?php if( have_rows('about_us_slider') ): ?>
    <div class="about_us_slider_container">
        <div class="about_us_slider_wrapper">
            <div class="about_us_slider">
                <?php $i=1; ?>
                <?php while( have_rows('about_us_slider') ) : the_row(); ?>
                    <?php 
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                    ?>
                    <div class="post_column">
                        <div class="title_column">
                            <div class="left_col">
                                <h4><?php echo $title ?></h4>
                            </div>
                            <div class="right_col">
                                <span class="post_index">
                                    <?php echo ($i<=10) ? '0'.$i : $i; $i++;?>
                                </span>
                            </div>
                        </div>
                        <div class="content_column">
                            <?php  echo  $content; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="about_slider_arrows">
            <span class="ab_arrow_left dashicons dashicons-arrow-left-alt2"></span>
            <span class="ab_arrow_right dashicons dashicons-arrow-right-alt2"></span>
        </div> 
    </div>
<?php endif; ?>