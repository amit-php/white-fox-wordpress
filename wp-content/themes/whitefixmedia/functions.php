<?php

/*****************************************
 * Weaver's Web Functions & Definitions *

/* Optional Panel Helper Functions
/*--------------------------------------*/
foreach (glob(get_template_directory() . '/functions/*.php') as $files) {
	include_once $files;
}


/* Post Type Helper Functions
/*--------------------------------------*/

foreach (glob(get_template_directory() . '/inc/post_type/*.php') as $file) {
	include_once $file;
}


function weaversweb_ftn_wp_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		if (is_singular() and get_site_option('thread_comments')) {
			wp_print_scripts('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'weaversweb_ftn_wp_enqueue_scripts');
function weaversweb_ftn_get_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	if (isset($options[$name]))
		return $options[$name];
}
function weaversweb_ftn_update_option($name, $value)
{
	$options = get_option('weaversweb_ftn_options');
	$options[$name] = $value;
	return update_option('weaversweb_ftn_options', $options);
}
function weaversweb_ftn_delete_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	unset($options[$name]);
	return update_option('weaversweb_ftn_options', $options);
}
function get_theme_value($field)
{
	$field1 = weaversweb_ftn_get_option($field);
	if (!empty($field1)) {
		$field_val = $field1;
	}
	return $field_val;
}


/*--------------------------------------*/
/* Theme Helper Functions
/*--------------------------------------*/
if (!function_exists('weaversweb_theme_setup')) :
	function weaversweb_theme_setup()
	{
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'weaversweb'),
				'secondary' => __('Secondary Menu', 'weaversweb'),
			)
		);

		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	}
endif;
add_action('after_setup_theme', 'weaversweb_theme_setup');




function weaversweb_scripts()
{
	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array());
	//wp_enqueue_style('validator-css', 'https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css', array());
	wp_enqueue_style('font-awesome-all-min', get_template_directory_uri() . '/assets/css/font-awesome-all.min.css', array());
	wp_enqueue_style('owl-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array());
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array());
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array());
	wp_enqueue_style('custom.css', get_template_directory_uri() . '/assets/css/custom.css', array());
	// Load the Internet Explorer specific script.

	global $wp_scripts;




	

	//wp_enqueue_script('boot', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script('popper-min-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
	wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), false);
	wp_enqueue_script('bootstrap-bundle-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false);
	wp_enqueue_script('font-awesome-all-min-js', get_template_directory_uri() . '/assets/js/font-awesome-all.min.js', array('jquery'), false);
	wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false);
	// wp_enqueue_script('validator-js', 'https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js', array('jquery'), false);
	// wp_enqueue_script('boots-validator-js', 'https://hostssb.weavers-web.com/wp-content/themes/hostssb/assets/js/bootstrap-validation.js', array('jquery'), false);

	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), 1, 1, 1);
}
add_action('wp_enqueue_scripts', 'weaversweb_scripts');



//** SVG format supporter

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext' => $filetype['ext'],
		'type' => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'fix_svg');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Header Settings',
		'menu_title'    => 'Header',
		'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Footer Settings',
		'menu_title'    => 'Footer',
		'parent_slug'   => 'theme-general-settings',
	));
}	


function hook_javascript()
{
	?>
	<script type="text/javascript">
		var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
	</script>
	<?php
}
////load more function
add_action('wp_ajax_my_ajax_action_project', 'my_ajax_action_project');
add_action('wp_ajax_nopriv_my_ajax_action_project', 'my_ajax_action_project');

function my_ajax_action_project()
{
	// $term = $_POST["termOptionValue"];
	$workType = $_POST["jobTypeValue"];

	$args = array(
		'post_type' => 'ourworks',
		'posts_per_page' => 4, // Set to -1 to retrieve all posts, or specify the number of posts to retrieve
		'tax_query' => array(
			// 'relation' => 'AND', // Retrieves posts that have both taxonomies
		),
	);
	// Add tax queries dynamically if term slugs are provided

	if (!empty($workType)) {
		$args['tax_query'][] = array(
			'taxonomy' => 'Ourworks_type',
			'field' => 'term_id',
			'terms' => $workType,
		);
	}
	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post(); ?>
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
		<?php }
	}
	$total_posts = $query->found_posts;
	$maxpage = $query->max_num_pages;
	$remaining_page = $total_posts - 4;

	echo json_encode(
		array(
			'post_count' => $remaining_page,
			'content' => ob_get_clean(), // Get buffered output and clean buffer
		)
	);
	// Always exit to avoid extra output
	wp_die();

}

add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');

function load_more_projects()
{
	$page = $_POST['page'];
	$post_perpage = 4; // Number of posts per page


	$job_type = isset($_POST['job_type']) ? $_POST['job_type'] : array();
	// $work_location = isset($_POST['term_slug']) ? $_POST['term_slug'] : array();

	//echo $job_type;
	//echo $work_location;
	//die;

	if (!empty($job_type)) {
		$tax_query[] = array(
			'taxonomy' => 'Ourworks_type',
			'field' => 'term_id',
			'terms' => $job_type,
		);
	}

	// Perform your query and return the response
	$args = array(
		'post_type' => 'ourworks',
		'posts_per_page' => $post_perpage,
		'order' => 'DESC',
		'paged' => $page,
		'post_status' => 'publish',
		'tax_query' => $tax_query,
	);

	$loop = new WP_Query($args);


	if ($loop->have_posts()) {
		while ($loop->have_posts()) {
			$loop->the_post();
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
		//wp_reset_postdata(); // Reset post data after the loop
	}
	$total_posts = $loop->found_posts;
	$maxpage = $loop->max_num_pages;
	$remaining_page = $maxpage - $page;

	echo json_encode(
		array(
			'post_count' => $remaining_page,
			'content' => ob_get_clean(), // Get buffered output and clean buffer
		)
	);
	// Always exit to avoid extra output
	wp_die();
}