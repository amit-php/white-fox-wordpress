
</main>

    <footer class="footer-main">
      <div class="container">
        <div class="footer-logo-wrap">
          <div class="footer-logo">
            <img src="<?php echo get_field('footer_logo_image','option'); ?>" alt="Logo">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="footer-col-left">
              <p class="mb-0"> <?php echo get_field('footer_description','option'); ?> </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="footer-col-right">
              <ul>
              <?php 
                wp_nav_menu( array(
                'menu' => 'footer1',
                'container' => false,
                    'items_wrap' => '%3$s',

                ) ); 
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyright">
          <ul>
          <?php 
                wp_nav_menu( array(
                'menu' => 'footer2',
                'container' => false,
                    'items_wrap' => '%3$s',

                ) ); 
                ?>
          </ul>
          <p>© <?php echo date('Y') ?>, <?php echo get_field('copyright','option'); ?></p>
        </div>

      </div>
      <div class="footer-bottom"><?php echo get_field('footer_bottom','option'); ?></div>
    </footer>

  </div>

  <?php wp_footer(); ?>
</body>

</html>




