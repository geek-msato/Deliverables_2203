		<footer class="st-Footer" id="footer">
			<div class="st-Footer_Inn">
				<div class="st-Footer_Logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/common/images/logo_white.png" alt="deliv2203">
					</a>
				</div>
				<div class="st-Footer_Nav">
					<ul class="st-Footer_List">
						<li><a href="<?php echo home_url(); ?>/news/">NEWS</a></li>
						<li><a href="<?php echo home_url(); ?>/recruit/">RECRUIT</a></li>
					</ul>
				</div>
			</div>
			<p class="st-Copy">&copy; 2022 Mikaze Sato.</p>
		</footer>
		<div class="st-scroll" id="js-scroll">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/common/images/ic_top.png" alt="" loading="lazy">
		</div>

		<?php wp_footer(); ?>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/common/js/common.js"></script>
	</body>
</html>
