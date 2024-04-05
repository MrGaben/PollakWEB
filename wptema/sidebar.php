<aside id="sidebar" class="sidebar">
    <div class="widget">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts(
                array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                )
            );
            foreach ($recent_posts as $post):
                ?>
                <li><a href="<?php echo get_permalink($post['ID']); ?>">
                        <?php echo $post['post_title']; ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="widget">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <?php
            $categories = get_categories();
            foreach ($categories as $category):
                ?>
                <li><a href="<?php echo get_category_link($category->term_id); ?>">
                        <?php echo $category->name; ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>