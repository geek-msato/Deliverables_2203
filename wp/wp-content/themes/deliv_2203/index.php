<?php
get_header();
?>

    <main>
      <section class="top-mv">
        <h1>Hello World!</h1>
        <p>2022年3月成果物 Wordpress採用サイト</p>
      </section>
      <!-- /.top-mv -->

      <section class="top-news st-Inner">
        <h2 class="sw-Heading_type01">NEWS<span>ニュース</span></h2>
        <div class="top-newsWrap">
          <?php
            $per_page = 2;
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
          <a href="<?php echo get_permalink(); ?>">
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
          <?php endwhile; endif; ?>
        </div>
      </section>
      <!-- /.top-news -->

      <section class="top-about st-Inner">
        <h2 class="sw-Heading_type01">ABOUT<span>このサイトについて</span></h2>
        <div class="top-aboutWrap">
          <p>このサイトは、2022年3月成果物用に構築した採用サイトです。中身はすべてダミーです。</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
        </div>
      </section>
      <!-- /.top-about -->

      <section class="top-recruit st-Inner">
        <h2 class="sw-Heading_type01">RECRUIT<span>採用情報</span></h2>
        <div class="top-recruitWrap">
          <a href="<?php echo home_url(); ?>/recruit/">
            採用情報はこちらから
          </a>
        </div>
      </section>
      <!-- /.top-recruit -->
    </main>

<?php
get_footer();
?>
