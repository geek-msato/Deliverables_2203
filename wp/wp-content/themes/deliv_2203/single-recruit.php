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

      <h3>関連する採用情報</h3>
      <div class="recruit-index">
        <?php // 現在表示されている投稿と同じタームに分類された投稿を取得
          $taxonomy_slug = 'cat_recruit'; // タクソノミーのスラッグを指定
          $post_type_slug = 'recruit'; // 投稿タイプのスラッグを指定
          $post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
          if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
            $terms_slug = array(); // 配列のセット
            foreach( $post_terms as $value ){ // 配列の作成
              $terms_slug[] = $value->slug; // タームのスラッグを配列に追加
            }
          }
          $args = array(
            'post_type' => $post_type_slug, // 投稿タイプを指定
            'posts_per_page' => 3, // 表示件数を指定
            'post__not_in' => array($post->ID), // 現在の投稿を除外
            'tax_query' => array( // タクソノミーパラメーターを使用
              array(
                'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
                'field' => 'slug', // スラッグに一致するタームを返す
                'terms' => $terms_slug // タームの配列を指定
              )
            )
          );
          $the_query = new WP_Query($args); if($the_query->have_posts()):
        ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
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
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</main>

<?php get_footer(); ?>
