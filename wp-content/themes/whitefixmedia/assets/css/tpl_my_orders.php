<?php /* Template Name: My Orders Page */ ?>
<?php 
$current_user_id = get_current_user_id();
if ( ! is_user_logged_in() ){
    echo "<script>window.location.href='".get_permalink(get_page_by_path('sign-in'))."'</script>";
}
?>
<?php get_header(); ?>
<section class="edit-profile-sec ads-management dashboard-wrap sec_pad position-relative">
    <div class="container">
        <?php 
        if(isset($message)){
            echo $message;
        }
        ?>
        <div class="dashboard-main-box position-relative">
            <?php echo get_sidebar('dashboard'); ?>
            <div class="dashboard-right">
                <h3>My Orders</h3>
                    <div class="col-md-12">
                        <div class="card-dashboard">
                            <div class="card-header-dashboard">
                                <h5 class="text-dark">My Radio Packages</h5>
                            </div>
                            <?php if(isset($_GET['post_id'])){
                                $post_id = $_GET['post_id'];
                                $post_date = get_the_date( 'j F Y', $post_id );
                                $upload_sig_img_url = get_post_meta($post_id, 'upload_sig_img_url', true);
                                $orderd_trans_id = get_post_meta($post_id, 'orderd_trans_id', true);
                                $orderd_by_user_id = get_post_meta($post_id, 'orderd_by_user_id', true);
                                $orderd_by_user_name = get_user_meta($orderd_by_user_id, 'first_name', true).' '. get_user_meta($orderd_by_user_id, 'last_name', true);
                                $phone = get_user_meta($orderd_by_user_id, 'phone', true);
                                $order_billing_str_address = get_post_meta($post_id, 'order_billing_str_address', true);
                                $order_billing_city = get_post_meta($post_id, 'order_billing_city', true);
                                $order_billing_state = get_post_meta($post_id, 'order_billing_state', true);
                                $order_billing_country = get_post_meta($post_id, 'order_billing_country', true);
                                $order_billing_zip = get_post_meta($post_id, 'order_billing_zip', true);
                                $order_user_email = get_post_meta($post_id, 'order_user_email', true);
                                $order_business_str_address = get_post_meta($post_id, 'order_business_str_address', true);
                                $order_business_city = get_post_meta($post_id, 'order_business_city', true);
                                $order_business_state = get_post_meta($post_id, 'order_business_state', true);
                                $order_business_country = get_post_meta($post_id, 'order_business_country', true);
                                $order_business_zip = get_post_meta($post_id, 'order_business_zip', true);

                                // order data 
                                $item_name = get_post_meta($post_id, 'order_item_name', true);
                                $order_price = get_post_meta($post_id, 'order_price', true);
                                $order_total = get_post_meta($post_id, 'order_total_price', true);
                                $order_item_number = get_post_meta($post_id, 'order_item_number', true);
                                $post_title = get_the_title( $order_item_number );
                                $thumbnail_url = get_the_post_thumbnail_url( $order_item_number );
                                $tax_percentage = get_option('ads_plans_tax_percentage', '');
                                $gct = (int)$order_price * (int)$tax_percentage / 100;  

                                // othere data
                                $order_advertiser = get_post_meta($post_id, 'order_advertiser', true);
                                $order_careof = get_post_meta($post_id, 'order_careof', true);
                                $order_cont = get_post_meta($post_id, 'order_cont', true);
                                $order_aggredate = get_post_meta($post_id, 'order_aggredate', true);
                                $order_protobeadvertiser = get_post_meta($post_id, 'order_protobeadvertiser', true);
                                $order_valueofcontact = get_post_meta($post_id, 'order_valueofcontact', true);
                                $order_termsofpayment = get_post_meta($post_id, 'order_termsofpayment', true);
                                $order_instruction = get_post_meta($post_id, 'order_instruction', true);
                                $order_payment_status = get_post_meta($post_id, 'order_payment_status', true);
                                ?>
                                <div class="row p-2 text-dark">
                                    <div class="col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header">Order <?php echo get_the_title($post_id); ?></div>
                                            <div class="card-body">
                                                <p>Payment Via Online Stripe Payment ( ID - <?php echo $orderd_trans_id; ?> )</p>
                                                <h5 class="text-dark">General</h5>
                                                <p>Date Created: <?php echo $post_date; ?></p>
                                                <h5 class="text-dark">Customer Details</h5>
                                                <p><?php echo $orderd_by_user_name; ?></p>
                                                <p>Signature Image: <a href="<?php echo $upload_sig_img_url;?>" target="_blank">View</a></p>
                                                <p>Payment Status: <?php echo ($post->post_status == 'publish')? 'Paid' : 'Not Paid'; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header">Billing Details</div>
                                            <div class="card-body">
                                                <p><?php echo $order_billing_str_address; ?>, <?php echo $order_billing_city; ?>, <?php echo $order_billing_state; ?>, <?php echo $order_billing_country; ?></p>
                                                <p><?php echo $order_billing_zip; ?></p>
                                                <h5 class="text-dark">Email Address</h5>
                                                <p><a href="mailto:<?php echo $order_user_email; ?>"><?php echo $order_user_email; ?></a></p>
                                                <h5 class="text-dark">Contact Number</h5>
                                                <p><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header">Shipping</div>
                                            <div class="card-body">
                                            <p><?php echo $order_business_str_address; ?>, <?php echo $order_business_city; ?>, <?php echo $order_business_state; ?>, <?php echo $order_business_country; ?>,</p>
                                            <p><?php echo $order_business_zip; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- order details -->
                             <h5 class="text-dark">Order Item</h5>
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $thumbnail_url;?>" alt="<?php echo $post_title;?>" width="50" height="50" /> <?php echo $item_name; ?></td>
                                        <td style="padding-top: 20px;">$<?php echo $order_price;?></td>
                                        <td style="padding-top: 20px;">1</td>
                                        <td style="padding-top: 20px;">$<?php echo $order_price;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>Sub Total : </strong></td>
                                        <td>$<?php echo $order_price;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>GCT : </strong></td>
                                        <td>$<?php echo $gct;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><strong>Total Amount : </strong></td>
                                        <td>$<?php echo $order_total;?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- other details -->
                            <div class="container">
                                <h5 class="text-dark">Order Othet Details</h5>
                                <div class="col-md-12">
                                    <div class="row text-dark">
                                        <div class="col-md-6">Advertiser : <?php echo $order_advertiser; ?></div>
                                        <div class="col-md-6">Advertiser c/o : <?php echo $order_careof; ?></div>
                                        <div class="col-md-6">Advertiser Contact # : <?php echo $order_cont; ?></div>
                                        <div class="col-md-6">Date of Agreement : <?php echo $order_aggredate; ?></div>
                                        <div class="col-md-6">Product to be Advertised : <?php echo $order_protobeadvertiser; ?></div>
                                        <div class="col-md-6">Value of Contract : <?php echo $order_valueofcontact; ?></div>
                                        <div class="col-md-6">Terms of Payment : <?php echo $order_termsofpayment; ?></div>
                                        <div class="col-md-6">Instruction : <?php echo $order_instruction; ?></div>
                                        <div class="col-md-6">Payment Status : <?php echo $order_payment_status; ?></div>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }else{?>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $args = [
                                            'post_type'  => 'ads-order', 
                                            'posts_per_page' => -1,
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'meta_query' => array(
                                                    array(
                                                        'key'   => 'orderd_by_user_id',
                                                        'value' => $current_user_id,
                                                    )
                                                )
                                        ];
                                        $query = new WP_Query($args);
                                        if ($query->have_posts()) {
                                            while ($query->have_posts()) {
                                                $query->the_post();
                                                $post_id = get_the_ID();
                                                $upload_sig_img_url = get_post_meta($post_id, 'upload_sig_img_url', true);
                                        ?>
                                                <tr>
                                                    <td><?php echo get_the_title(); ?></td>
                                                    <td><img src="<?php echo $upload_sig_img_url;?>" alt="<?php echo get_the_title(); ?>" width="100" height="100"></td>
                                                    <td><?php echo get_the_date('Y-m-d');?></td>
                                                    <td><a href="?post_id=<?php echo $post_id; ?>" class="btn">View</a></td>
                                                </tr>
                                        <?php 
                                            } 
                                        } else {
                                            // Optional: Display a message if no posts are found
                                            echo '<tr><td colspan="4">No ads found for this user.</td></tr>';
                                        }
                                        // Reset post data
                                        wp_reset_postdata();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>