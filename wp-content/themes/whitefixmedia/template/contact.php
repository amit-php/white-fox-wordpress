<?php
/**
 * Template Name: Contact Page
 * 
 */ 
get_header();?>
      <section class="talkSec common-padd">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
            <div class="talkTitle text-center text-uppercase common-padd pt-0">
              <h1><?php echo get_field('contact_header'); ?></h1>
            </div>
            </div>
          </div>
          <div class="row">
          
            <div class="col-md-4 mb-md-0 mb-3">
              <div class="talkBox text-center text-uppercase">
              <div class="talk-content">
                <h2><?php echo get_field('add_phone_no'); ?></h2>
                <ul>
                    <?php
                    $phone1 = get_field('phone_no_1');
                    if(!empty($phone1)){
                    ?>
                  <li><a href="tel:+<?php echo $phone1; ?>">+<?php echo $phone1; ?></a></li>
                  <?php } ?>
                  <?php
                    $phone2 = get_field('phone_no2');
                    if(!empty($phone2)){
                    ?>
                  <li><a href="tel:+<?php echo $phone2; ?>">+<?php echo $phone2; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              </div>
            </div>
           
            <div class="col-md-4 mb-md-0 mb-3">
              <div class="talkBox text-center text-uppercase">
              <div class="talk-content">
                <h2><?php echo get_field('add_email'); ?></h2>
                <ul>
                    <?php 
                    $email = get_field('email_id');
                    if(!empty($email)){
                    ?>
                  <li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              </div>
            </div>

            <div class="col-md-4 mb-md-0 mb-3">
              <div class="talkBox text-center text-uppercase">
              <div class="talk-content">
                <h2><?php echo get_field('add_adress'); ?></h2>
                <ul>
                    <?php
                    $address= get_field('address_name');
                    if(!empty($address)){
                    ?>
                  <li><?php echo $address; ?></li>
                  <?php } ?>
                </ul>
              </div>
              </div>
            </div>

          </div>

      </section>

      <section class="contact-formSec common-padd">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-lg-5 mb-4">
                <?php
                $form_id = get_field('form_field');
                if(!empty($form_id)){
                ?>
              <h2><?php echo $form_id; ?></h2>
              <?php } ?>
            </div>
          </div>
          <?php echo do_shortcode(get_field('form_id')); ?>

          <!-- <div class="row">
            <div class="col-md-6 form-floating mb-lg-4 mb-3">
              <input type="text" class="form-control" id="floatingInput1" placeholder="FIRST NAME">
              <label for="floatingInput1">FIRST NAME <span>*</span></label>
            </div>

            <div class="col-md-6 form-floating mb-lg-4 mb-3">
              <input type="text" class="form-control" id="floatingInput2" placeholder="LAST NAME">
              <label for="floatingInput2">LAST NAME <span>*</span></label>
            </div>

            <div class="col-md-6 form-floating mb-lg-4 mb-3">
              <input type="email" class="form-control" id="floatingInput3" placeholder="Email">
              <label for="floatingInput3">Email <span>*</span></label>
            </div>

            <div class="col-md-6 form-floating mb-lg-4 mb-3">
              <input type="text" class="form-control" id="floatingInput4" placeholder="Phone">
              <label for="floatingInput4">Phone <span>*</span></label>
            </div>

            <div class="col-md-12 form-floating mb-lg-4 mb-3">
              <textarea class="form-control" rows="5" id="floatingInput5" placeholder="Message"></textarea>
              <label for="floatingInput5">Message <span>*</span></label>
            </div>

            <div class="col-md-12 text-center mt-lg-5 mt-4">
              <button type="submit" class="textBtn">SUBMIT</button>
            </div>
        
          </div> -->
        </div>
      </section>
<?php get_footer(); ?>