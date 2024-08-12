<?php get_header();?>
      <section class="work-bannSec common-padd">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <div class="work-bannRow">
              <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb'); 
              if($imagepath[0]){?>
                <img src="<?php echo $imagepath[0]; ?>" alt="bann-work-details">
                <?php } ?>
                <div class="work-bannContent largeTitle text-center text-white">
                  <h1>#<?php echo get_the_title(); ?>..</h1>
                  <p><?php echo get_the_excerpt(); ?></p>
                </div>
              </div>
            </div>
          </div>

      </section>

      <section class="trailerSec">
        <div class="container">
          <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-uppercase tatle-pb"><h2><?php echo get_field('add_trailer'); ?></h2></div>
            <div class="trailerBox position-relative">
                <?php
                $image = get_field('tailer_image');
                if(!empty($image)){
                ?>
              <img src="<?php echo $image; ?>" alt="trailer-pic">
              <?php } ?>
              <?php ?>
              <?php
              $video_field = get_field('video_field');
       if ($video_field) {
        ?>
              <button type="button" class="playBtn" data-bs-toggle="modal" data-bs-target="#trailerModal"><img src="<?php echo get_field('button_image'); ?>" alt="paly-btn"></button>
              <?php } ?>
            </div>



<!-- Modal(Start) -->
<div class="modal fade trailerModal-design" id="trailerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="modalPic">
        <?php
        $video_field = get_field('video_field');
       if ($video_field) {
        ?>
          <iframe src="<?php echo $video_field; ?>" class="vdo w-100" frameborder="0"></iframe>
        <?php } ?> 
         <!-- <video class="vdo w-100" loop="1" autoplay="auto" muted="">
            <source type="video/mp4" src="videos/Butterfield-Bermuda.mp4">
          </video> -->
       </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- Modal(End) -->

          </div>
          </div>
        </div>
      </section>

      <section class="about-docSec common-padd">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
              <div class="about-docR">
                <div id="aboutDoc_carousel" class="owl-carousel owl-theme">
                <?php
          if( have_rows('image_slider') ){ 
            while( have_rows('image_slider') ) {
              the_row();
              ?>
                  <div class="item">
                    <div class="about-docPic"><img src="<?php echo get_sub_field('slider_image') ?>" alt="about-slider-pic"></div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 order-md-1">
              <div class="about-docContent pe-xl-5 pe-lg-4">
                <h2><?php echo get_field('add_about_title'); ?></h2>
                <?php echo get_field('add_about_description'); ?>
              </div>
          </div>
          </div>
        </div>
      </section>

      <section class="episodeSec">
        <div class="container">
         <?php
            if( have_rows('episode') ){
                while( have_rows('episode') ) {
                    the_row();
                    
         ?>    
          <div class="row">
            <div class="col-md-12">
              <div class="episodeBox position-relative">
                <?php
                $image = get_sub_field('episode_image');
                if(!empty($image)){
                ?>
                <img src="<?php echo $image; ?>" alt="episode-one-pic">
                <?php } ?>
                <div class="episodeTitle"><?php echo get_sub_field('episode_title'); ?></div>
                <?php
                $video = get_sub_field('episode_videos');
                if(!empty($video)){
                ?>
                <button type="button" class="playBtn" data-bs-toggle="modal" data-bs-target="#trailerModal"><img src="<?php echo get_sub_field('episode_button'); ?>" alt="paly-btn"></button>
                <?php } ?>
              </div>
            </div>
          </div>
         <?php } } ?> 
          

            <!-- Modal(Start) -->
            <div class="modal fade trailerModal-design" id="trailerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                   <div class="modalPic">
                   <?php
                        if( have_rows('episode') ){
                            while( have_rows('episode') ) {
                                the_row();
                                
                    ?>   
                     <video class="vdo w-100" loop="1" autoplay="auto" muted="">
                        <source type="video/mp4" src="<?php echo get_sub_field('episode_videos'); ?>">
                      </video>
                      <?php } } ?>
                   </div>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- Modal(End) -->

            
          
        </div>
      </section>

      <section class="directorSec common-padd pt-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
            <div class="directorPic">
                <?php
                $image = get_field('diector_image');
                if(!empty($image)){
                ?>
              <img src="<?php echo $image; ?>" alt="director-pic">
              <?php } ?>
            </div>
            </div>
            <div class="col-md-6">
              <div class="directorContent ps-xl-5 ps-lg-4">
                <h2><?php echo get_field('director_title'); ?></h2>
                <div class="directorName"><?php echo get_field('director_name'); ?></div>
                <?php echo get_field('director_brief'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php get_footer(); ?>