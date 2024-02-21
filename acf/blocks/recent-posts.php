<?php

/**
 * Custom NojuCommerce Product list block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'recent-posts-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-recent-posts';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid my-5">
    <div class="container">
        <div class="row">
           <div class="col-lg-6">

               <p>--- Recent posts</p>
               <h2>Latest Noju posts</h2>
               <p>You may be interested in our technologies. We want to share more helpful infomation with you about our digital life and methods.</p>
           </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 d-flex">
                        <div class="ratio ratio-1x1">
                            <img class="w-100 h-auto" src="http://noju.local/wp-content/uploads/2022/12/leaves-g9c81b4562_1920.jpg" alt="">
                        </div>
                        <div>
                            <span>Web | 19.09.2022</span>
                            <h3>Digital Media</h3>
                            <p>Seamless integration across all digital media channels with advanced targeting full combined handful.</p>
                            <a href="#">Read more &raquo;</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="ratio ratio-1x1">
                            <img class="w-100 h-auto" src="http://noju.local/wp-content/uploads/2022/12/leaves-g9c81b4562_1920.jpg" alt="">
                        </div>
                        <div>
                            <span>Web | 19.09.2022</span>
                            <h3>Development</h3>
                            <p>We use the latest technology and we never stop learning and that's why model sentence structures.</p>
                            <a href="#">Read more &raquo;</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="ratio ratio-1x1">
                            <img class="w-100 h-auto" src="http://noju.local/wp-content/uploads/2022/12/leaves-g9c81b4562_1920.jpg" alt="">
                        </div>
                        <div>
                            <span>Web | 19.09.2022</span>
                            <h3>Strategy</h3>
                            <p>From concept to execution, we create digital campaigns from scratch and show combined with of structures.</p>
                            <a href="#">Read more &raquo;</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="ratio ratio-1x1">
                            <img class="w-100 h-auto" src="http://noju.local/wp-content/uploads/2022/12/leaves-g9c81b4562_1920.jpg" alt="">
                        </div>
                        <div>
                            <span>Web | 19.09.2022</span>
                            <h3>Analytics</h3>
                            <p>From concept to execution, we create digital campaigns from scratch and show you structures.</p>
                            <a href="#">Read more &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>