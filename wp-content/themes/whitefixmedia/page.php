<?php get_header();
// get_sidebar('innerbanner');
?>
<section class="inner-about-two content-page common-padd">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php echo wpautop(the_content()); ?>
			</div>			
		</div>
	</div>
</section>
<?php get_footer(); ?>