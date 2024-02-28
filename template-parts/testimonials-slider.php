<?php 

$front_page_id = get_option('page_on_front');

if( have_rows('testimonials', $front_page_id ) ): ?>
    <div class="testimonilas_slider_container">
        <div class="testimonials_slider_wrapper">
            <div class="testimonials_slider">
                <?php while( have_rows('testimonials', $front_page_id ) ) : the_row(); ?>
                    <?php 
                        $user_image = get_sub_field('user_image');
                        $user_first_name = get_sub_field('user_first_name');
                        $user_last_name = get_sub_field('user_last_name');
                        $post_date = get_sub_field('testimonial_post_date');
                        $paragraph = get_sub_field('testimonials_paragraph');
                        $star_rating = get_sub_field('star_rating');
                    ?>
                    <div class="testimonial_column">
                        <?php if($star_rating) : ?>
                            <div class="rating_col">
                                <?php for($i=1;$i <= $star_rating;$i++) { ?>
                                    <span class="dashicons dashicons-star-filled"></span>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                        <?php if( $user_image || $user_first_name || $user_last_name || $post_date ) : ?>
                            <div class="info_col">
                                <?php if( $user_image ) { ?>
                                    <div class="img_col">
                                        <?php echo wp_get_attachment_image( $user_image,  'testimonial-thumb-size'); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="img_col">
                                        <img src="<?php echo get_template_directory_uri().'/images/testimonial-defoult-img.jpg' ?>" alt="E11even testimonial defoult image">
                                    </div>
                                <?php } ?>
                                <?php if( $user_first_name || $user_last_name || $post_date ) : ?>
                                    <div class="name_col">
                                        <?php if($user_first_name) : ?>
                                            <span class="firstname"><?php  echo  $user_first_name; ?></span>
                                        <?php endif; ?>
                                        <?php if($user_last_name) : ?>
                                            <span class="lastname"><?php  echo  $user_last_name; ?></span>
                                        <?php endif; ?>
                                        <?php if( $post_date ) : ?>
                                            <span class="date"><?php echo $post_date; ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($paragraph) : ?>
                            <div class="content_column">
                                <?php  echo  $paragraph; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="testimonials_slider_arrows">
            <span class="test_arrow_left dashicons dashicons-arrow-left-alt2"></span>
            <span class="test_arrow_right dashicons dashicons-arrow-right-alt2"></span>
        </div> 
    </div>
<?php endif; ?>