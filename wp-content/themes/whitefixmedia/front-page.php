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
             // $counter = 1;
                while($our_work_query->have_posts()): $our_work_query->the_post();?>
            <div class="col-md-6 vimeo-video-section">
              <div class="video ">
              <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb'); ?>
                <img src="<?php echo $imagepath[0]; ?>" class="video-thumbnail" alt="">
                <?php 
                $video_field = get_field('video_field').$counter;
                if ($video_field) {
                   
                   ?>
                <iframe src="<?php echo $video_field; ?>&autoplay=1&title=0&byline=0&controls=0&muted=1" class="vdo w-100 vim-vid-def" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                <?php } ?>  
               

                <div class="onhover-text">
                <h1><a href="<?php echo get_the_permalink(get_the_id()); ?>">#<?php the_title(); ?></a>...</h1>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div> 
  
              
  
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




<!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/968920950?h=2f80ca3c80&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
  <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/911493454?h=a5baea05d5&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
    <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/901192693?h=459ca4b3bd&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
      <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/847247051?h=307ec0b464&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
        <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/842811312?h=caca58b9f7&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
          <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/692774837?h=98722bc4d0&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->
            <!-- <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/810087435?h=57d1a0070d&autoplay=1&loop=1&title=0&byline=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script> -->