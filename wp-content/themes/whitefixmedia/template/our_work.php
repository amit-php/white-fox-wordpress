<?php
/**
 * Template Name: Our work Page
 * 
 */ 
get_header();?>
      <section class="home-video-main common-padd">
        <div class="container-fluid">
        <div class="loader-wrp" style="display: none;">
            <div class="loader">
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/loader1.gif" alt="">
              <!-- <span style="--i: 6"></span>
              <span style="--i: 7"></span>
              <span style="--i: 8"></span>
              <span style="--i: 9"></span>
              <span style="--i: 10"></span>
              <span style="--i: 11"></span>
              <span style="--i: 12"></span>
              <span style="--i: 13"></span>
              <span style="--i: 14"></span>
              <span style="--i: 15"></span>
              <span style="--i: 16"></span>
              <span style="--i: 17"></span>
              <span style="--i: 18"></span>
              <span style="--i: 19"></span>
              <span style="--i: 20"></span> -->
            </div>
          </div>  
          <div class="row">
            <div class="col-md-12">
              <div class="filterBtnList">
              <ul class="d-flex justify-content-center">
                      <div class="form-check">
                        <input type="radio" value="" name="job-type" checked>
                        <label for="option1">All</label><br>
                      </div>

                      <?php
                      $project_types = get_terms(
                        array(
                          'taxonomy' => 'Ourworks_type', // Replace with your actual taxonomy name
                          'hide_empty' => false,
                        )
                      );

                      if (!empty($project_types) && !is_wp_error($project_types)) {
                        foreach ($project_types as $type) {
                          $active_class = ($_GET['Ourworks_type'] ?? '') === $type->slug ? 'active' : '';
                          ?>
                          <div class="form-check">
                            <input type="radio" value="<?php echo $type->term_id; ?>" name="job-type">
                            <label for="option1"><?php echo $type->name; ?></label>
                          </div>

                          <?php
                        }
                      }
                      ?>
                    </ul>
              </div>
            </div>
          </div>
          
          <div class="row position-relative common-padd" id="result">
          <?php
                      $post_perpage = 4;
                      $args = array(
                        'post_type' => 'ourworks',
                        'posts_per_page' => $post_perpage
                      );
                      $query = new WP_Query($args);
                      $postCount = $query->found_posts;
                      if ($query->have_posts()) {
                        while ($query->have_posts()) {
                          $query->the_post();
                          ?>
                            
                            <div class="col-md-6 filter <?php echo $term_classes_str; ?>">
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
                                </div>
                            </div>
                            <?php 
                        }
                    // wp_reset_postdata();
                }
            ?>
     
     
      </div>


      <div class="row">
                   <?php
                      if ($postCount > $post_perpage) {
                        ?>
            <div class="col-md-12 text-center">
            <a href="javascript:void(0)" id="load-more-button" class="btn textBtn" data-totalpage="<?php echo $page1; ?>"
            data-totalpost="<?php echo $postCount; ?>">Load More</a>
              <!-- <button type="button" class="textBtn" >load more</button> -->
            </div>
                <?php }
                      wp_reset_postdata(); ?>
        </div>
      </section>
      <script>
  var page = 2;
  jQuery(document).ready(function () {
    jQuery('input[name="job-type"]').change(function () {
      jQuery(".loader-wrp").css('display', 'block');
      page = 2;
      jQuery('#load-more-button').hide();
      var jobTypeValue = jQuery('input[name="job-type"]:checked').val();


      jQuery.ajax({
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        type: 'POST',
        data: {
          action: 'my_ajax_action_project',
          jobTypeValue: jobTypeValue,
        },
        success: function (response) {
          var responseData = JSON.parse(response);
          var postCount = responseData.post_count;
          var content = responseData.content;
          if (postCount > 0) {
            jQuery('#load-more-button').show();
          }
          // alert(postCount);
        
          var postCount = 2;
          jQuery(".loader-wrp").css('display', 'none');
          jQuery('#result').html(content);
          

        }
      });

    });



  });

  //loadmore
  jQuery(document).ready(function ($) {
    $('#load-more-button').click(function () {
      jQuery(".loader-wrp").css('display', 'block');
      // Increment page number
      var postcount = '<?php echo $postCount; ?>';
      var jobTypeValue = jQuery('input[name="job-type"]:checked').val();

      //alert(job_type);
      var data = {
        'action': 'load_more_projects',
        'page': page,
        // 'term_slug': termOptionValue,
        'totalpost': '<?php echo $postCount; ?>',
        'job_type': jobTypeValue,
      };

      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: data,
        success: function (response) {
          //alert(response);
          jQuery(".loader-wrp").css('display', 'none');
          // Append new posts to the container
          var responseData = JSON.parse(response);
          var postCount = responseData.post_count;
          var content = responseData.content;
          // alert(postCount);
          // ('#projects-container').append(content); // Append new posts to the container
          jQuery("#result").append(content);
          page++;
          // Hide the button if no more posts are found
          if (postCount == 0) {
            jQuery('#load-more-button').hide();
          }

        }
      });
    });
  });

  // Get all radio buttons
  const radioButtons = document.querySelectorAll('input[type="radio"][name="term-option"]');

  // Add event listener to each radio button
  radioButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Remove 'checked' attribute from all radio buttons
      radioButtons.forEach(btn => {
        btn.removeAttribute('checked');
      });
      // Add 'checked' attribute to the clicked radio button
      this.setAttribute('checked', 'checked');
    });
  });
  // Get all radio buttons
  const radioButtons2 = document.querySelectorAll('input[type="radio"][name="job-type"]');

  // Add event listener to each radio button
  radioButtons2.forEach(button => {
    button.addEventListener('click', function () {
      // Remove 'checked' attribute from all radio buttons
      radioButtons2.forEach(btn => {
        btn.removeAttribute('checked');
      });
      // Add 'checked' attribute to the clicked radio button
      this.setAttribute('checked', 'checked');
    });
  });
</script>

<?php get_footer(); ?>