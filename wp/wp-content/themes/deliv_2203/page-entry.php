<?php get_header(); ?>
<main>
  <div class="entry-head sw-Mv">
    <h1>ENTRY</h1>
    <div class="breadcrumb">
      <ul class="breadcrumb-menu">
        <li>
          <a href="<?php echo home_url(); ?>">TOP</a>
        </li>
        <li>ENTRY</li>
      </ul>
    </div>
  </div>
  <div class="entry-wrap st-Inner">
    <h2><img src="<?php echo get_template_directory_uri(); ?>/assets/entry/images/ic_entry.png" alt="" loading="lazy">応募フォーム</h2>
    <table class="entry-form">
      <tbody>
        <tr>
          <th>応募する求人</th>
          <td>
            <select name="entry-job" id="entry-job_select" class="entry-formSelect">
              <option value="">選択してください</option>
              <?php
                $args_recruit = array(
                  'post_type' => 'recruit',
                );
                $posts_recruit = new WP_Query($args_recruit);
                $pages = $the_query->max_num_pages;
                $wp_query->max_num_pages = $pages;
                if ($posts_recruit->have_posts()) :
                  while ($posts_recruit->have_posts()) : $posts_recruit->the_post();
                  $post_id = get_the_id();
              ?>
              <option value="<?php echo get_post_field( 'post_name', get_the_ID() ); ?>"><?php echo get_the_title(); ?></option>
              <?php endwhile; endif; ?>
            </select>
          </td>
        </tr>
        <?php
          echo do_shortcode('[contact-form-7 id="35" title="応募フォーム"]');
        ?>
      </tbody>
    </table>
    <div class="entry-privacy">
      <h3>個人情報の取り扱いについて</h3>
      <div class="entry-privacyContent">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="entry-agree">
        <label>
          <input type="checkbox" name="agree">
          <span>同意する</span>
        </label>
      </div>
    </div>
    <div class="entry-submit">
      <input type="submit" value="エントリーする">
      <p>※送信できません</p>
    </div>
  </div>
</main>
<?php get_footer(); ?>
