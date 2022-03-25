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
        <li>
          <a href="<?php echo home_url(); ?>/recruit/">RECRUIT</a>
        </li>
        <li><?php echo get_the_title(); ?></li>
      </ul>
    </div>
  </div>

  <div class="recruit-wrap st-Inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/recruit/images/ic_recruit.png" alt="" loading="lazy"><?php echo get_the_title(); ?></h2>
    <div class="recruit-content">

      <div class="recruit-detail"><?php echo get_the_content(); ?></div>
  
      <?php if (get_field('recruit_mv')): ?>
      <div class="recruit-contentImg">
        <img src="<?php echo get_field('recruit_mv'); ?>" alt="" loading="lazy">
        <span><?php echo get_field('recruit_mv_caption'); ?></span>
      </div>
      <?php endif; ?>

      <?php if (get_field('recruit_field')): ?>
      <div class="recruit-contentField">
        <?php while (the_repeater_field('recruit_field')): ?>
        <dl>
          <dt><?php echo the_sub_field('recruit_field_title'); ?></dt>
          <dd><?php echo the_sub_field('recruit_field_content'); ?></dd>
        </dl>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
