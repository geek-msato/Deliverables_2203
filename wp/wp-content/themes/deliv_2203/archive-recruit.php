<?php
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<main>
  <div class="recruit-head sw-Mv">
    <h1>RECRUIT</h1>
    <div class="breadcrumb">
      <ul class="breadcrumb-menu">
        <li>
          <a href="<?php echo home_url(); ?>">TOP</a>
        </li>
        <li>RECRUIT</li>
      </ul>
    </div>
  </div>

  <div class="recruit-wrap st-Inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/recruit/images/ic_recruit.png" alt="" loading="lazy">採用情報一覧</h2>
    <div class="recruit-index">
      <?php
        $per_page = 12;
        $args_recruit = array(
          'post_type' => 'recruit',
          'posts_per_page' => $per_page,
          'paged' => $paged,
        );
        $posts_recruit = new WP_Query($args_recruit);
        $pages = $the_query->max_num_pages;
        $wp_query->max_num_pages = $pages;
        if ($posts_recruit->have_posts()) :
          while ($posts_recruit->have_posts()) : $posts_recruit->the_post();
          $post_id = get_the_id();
      ?>
      <a href="<?php echo get_permalink(); ?>">
        <div class="recruit-indexImg">
          <?php if (get_field('recruit_mv')): ?>
          <img src="<?php echo get_field('recruit_mv'); ?>" alt="" loading="lazy">
          <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/recruit/images/img_recruit.jpg" alt="" loading="lazy">
          <?php endif; ?>
        </div>
        <div class="recruit-indexContent">
          <h3><?php echo get_the_title(); ?></h3>
          <?php
            $cat_terms = get_the_terms( $post->ID, 'cat_recruit' );
            if ($cat_terms && ! is_wp_error($cat_terms)):
          ?>
          <?php foreach($cat_terms as $cat_term): ?>
          <span class="category"><?php echo $cat_term->name; ?></span>
          <?php endforeach; endif; ?>
        </div>
      </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
