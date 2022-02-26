<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
	<?php if (is_front_page()) : ?>
	<title>トップ | 2203成果物 msato</title>
	<?php else: ?>
  <title><?php wp_title( ' | ','true','right' ); ?>2203成果物 msato</title>
	<?php endif; ?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<meta name="keywords" content="成果物,2022年3月成果物,採用サイト">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/common/css/common.css">
	<?php if (is_front_page()): ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/top/css/top.css">
	<?php endif; ?>
	<?php if (is_front_page()): ?>
	<meta name="description" content="2022年3月成果物。採用サイトを作成しました。">
	<?php endif; ?>
	<?php wp_head(); ?>
	</head>

	<?php if(is_user_logged_in()): ?>
	<body id="body" class="wp-login">
	<?php else: ?>
	<body id="body">
	<?php endif; ?>
		<header class="st-Header">
			<div class="st-Header_Logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/common/images/logo.png" alt="deliv2203">
				</a>
			</div>
			<div class="st-Header_NavWrap" id="js-spNav">
				<div class="st-Header_Btn" id="js-hamburger">
					<span class="hamburger-line hamburger-line_1"></span>
					<span class="hamburger-line hamburger-line_2"></span>
					<span class="hamburger-line hamburger-line_3"></span>
				</div>
				<div class="st-Header_Nav">
					<ul class="st-Header_List">
						<li><a href="<?php echo home_url(); ?>/news/">NEWS</a></li>
						<li><a href="<?php echo home_url(); ?>/recruit/">RECRUIT</a></li>
						<li class="st-Header_Entry"><a href="<?php echo home_url(); ?>/entry/">ENTRY</a></li>
					</ul>
				</div>
			</div>
		</header>
