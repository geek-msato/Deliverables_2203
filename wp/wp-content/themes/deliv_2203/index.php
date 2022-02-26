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
          <a href="#">
            <span class="day">2022/01/01</span>
            <span class="label">お知らせ</span>
            Lorem ipsum dolor sit amet
          </a>
          <a href="#">
            <span class="day">2022/01/01</span>
            <span class="label">お知らせ</span>
            Lorem ipsum dolor sit amet
          </a>
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
