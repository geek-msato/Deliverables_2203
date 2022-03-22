<?php
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<main>
  <div class="news-head sw-Mv">
    <h1>NEWS</h1>
    <div class="breadcrumb">
      <ul class="breadcrumb-menu">
        <li>
          <a href="<?php echo home_url(); ?>">TOP</a>
        </li>
        <li>NEWS</li>
      </ul>
    </div>
  </div>

  <div class="news-wrap st-Inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/news/images/ic_news.svg" alt="" loading="lazy">ニュース一覧</h2>
    <div class="news-index">
      <ul class="news-indexList">
        <?php
          $per_page = 12;
          $args_news = array(
            'post_type' => 'news',
            'posts_per_page' => $per_page,
            'paged' => $paged,
          );
          $posts_news = new WP_Query($args_news);
          $pages = $the_query->max_num_pages;
          $wp_query->max_num_pages = $pages;
          if ($posts_news->have_posts()) :
            while ($posts_news->have_posts()) : $posts_news->the_post();
            $post_id = get_the_id();
        ?>
        <li>
          <a href="<?php echo get_permalink(); ?>">
            <div class="news-indexImg">
              <?php if (has_post_thumbnail()): ?>
              <img src="<?php echo the_post_thumbnail_url(); ?>" alt="" loading="lazy">
              <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/news/images/img_news.jpg" alt="" loading="lazy">
              <?php endif; ?>
            </div>
            <span class="day"><?php the_time('Y/m/d'); ?></span>
            <?php
              $cat_terms = get_the_terms( $post->ID, 'cat_news' );
              if ($cat_terms && ! is_wp_error($cat_terms)):
            ?>
            <?php foreach($cat_terms as $cat_term): ?>
            <span class="label"><?php echo $cat_term->name; ?></span>
            <?php endforeach; endif; ?>
            <?php echo get_the_title(); ?>
          </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </div>
</main>

<?php get_footer(); ?>
