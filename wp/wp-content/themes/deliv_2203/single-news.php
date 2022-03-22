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
        <li>
          <a href="<?php echo home_url(); ?>/news/">NEWS</a>
        </li>
        <li><?php echo get_the_title(); ?></li>
      </ul>
    </div>
  </div>

  <div class="news-wrap st-Inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/news/images/ic_news.svg" alt="" loading="lazy"><?php echo get_the_title(); ?></h2>
    <div class="news-content">
      <?php echo get_the_content(); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
