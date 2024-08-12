 <!--header sction-->
<!DOCTYPE html>

<html <?php language_attributes(); ?>>


<head>
  <title><?php wp_title(); ?></title>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  wp_head(); ?>
</head>


<body <?php body_class(); ?>>

  <!--header sction-->
  <header class="main-header">
    <div class="container">
      <div class="header-row">
        <div class="logo for-mobile-logo">
          <?php 
          ?>
          <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_field('logo_image','option'); ?>" alt="logo image"></a>
        </div>
        <div class="hdr-rt">
          <div class="main-menu">
            <div class="nav_close" onclick="menu_close()">
              <i class="far fa-times-circle"></i>
            </div>
            <div class="header-left">
            <ul>
              <?php display_menu_items('Header Menu', 'Our Work'); ?>
           </ul>
          </div>

          <div class="logo for-desktop-logo">
              <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_field('logo_image','option'); ?>" alt="Logo"></a>
          </div>

          <div class="header-right">
            <ul>
              <?php display_menu_items('Header Menu', 'Contact'); ?>
            </ul>
          </div>

          <?php
          function display_menu_items($menu_name, $item_title) {
              $menu_items = wp_get_nav_menu_items($menu_name);
              
              if ($menu_items) {
                  foreach ($menu_items as $menu_item) {
                      if ($menu_item->title == $item_title) {
                          echo '<li><a href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '</a></li>';
                          break; // Stop the loop once the desired item is found
                      }
                  }
              } else {
                  echo '<li>No menu items found.</li>';
              }
          }
          

            // $menu = wp_get_nav_menu_object( 'wpdocs mainmenu' );

            // $menu_name = 'primary';
            // $locations = get_nav_menu_locations();
            // $menu_id   = $locations[ $menu_name ] ;
            // $obj = wp_get_nav_menu_object( $menu_id );
            // print_r($obj);

            // echo "<pre>";
            // $obj = wp_get_nav_menu_items('header-menu');
            // print_r($obj);
            // echo "</pre>";

            // $menu_items = get_menu_items_as_array('Primary Menu');
            // print_r($menu_items);
            ?>
          </div>
          <div onclick="menu_open()" class="nav_btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
      </div>
    </div>


  </header>
  <!--header sction-->
  <div class="grident-body">

    <main>




  <!--header sction-->