<?php get_header();?>
<section class="home-video-main common-padd">
        <div class="container-fluid">

          <div class="row position-relative">
            <?php
                $args = array(
            'post_type' => 'ourworks',
            'posts_per_page' => -1,
            'order' => 'ASC'
           );
            $our_work_query = new WP_Query($args);
            if($our_work_query->have_posts()):
                while($our_work_query->have_posts()): $our_work_query->the_post();?>
            <div class="col-md-6">
              <div class="video">
              <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb'); ?>
                <img src="<?php echo $imagepath[0]; ?>" alt="">
                <?php 
                $video_field = get_field('video_field');
                if ($video_field) {
                   
                   ?>
                <iframe src="<?php echo $video_field; ?>" class="vdo w-100" frameborder="0"></iframe>
                <?php } ?>  
               

                <div class="onhover-text">
                <h1><a href="<?php echo get_the_permalink(get_the_id()); ?>">#<?php the_title(); ?></a>...</h1>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div> 
  
                <!-- <div class="catagory-text"> documentary </div> -->
  
              </div>
  
            </div>
            <?php 
            endwhile;
            endif;
            wp_reset_query();
           ?>
          </div>
        </div>



      </section>

      <section class="logo-slider-sec sec-title-x common-padd  pt-0 position-relative">

        <div class="title-ticker logo-slider">

          <div class="ticker-oval">
          <?php
          if( have_rows('homepage_repater_image') ){ 
            $images = [];
            while( have_rows('homepage_repater_image') ) {
              the_row();
              $images[] = get_sub_field('image');
              
            }
            // print_r($images);
              $numberOfChunks = 3;
              $chunkSize = ceil(count($images) / $numberOfChunks);
              $chunks = array_chunk($images, $chunkSize);
              foreach($chunks as $k => $ch) { 
                // print_r($k);
          ?>
              <div class="text-roller owl-carousel owl-theme" id="text-roller<?php echo $k+1; ?>">
              <?php foreach($ch as $sub_value) { ?>
                  <div class="item">
                      <div class="benefits-item text-center">
                          <div class="burningSand-r">
                              <img src="<?php echo esc_url($sub_value); ?>" alt="">
                          </div>
                      </div>
                  </div>
              <?php 
             }
              ?>
              </div>
          <?php 
         } 
        }
          ?>
      </section>
<?php get_footer(); ?>